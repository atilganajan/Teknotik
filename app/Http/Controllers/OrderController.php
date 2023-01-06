<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderCreateRequest;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function adminIndex()
    {

        $orders = Order::with("items.product")->paginate(10);
        return view("admin.order.orders", compact("orders"));
    }

    public function adminOrderDetail($id)
    {
        $order = Order::with("items.product")->find($id);
        return view("admin.order.detail", compact("order"));
    }

    public function adminOrderStatusUpdate(Request $request, $id)
    {
        $request->validate([
            "status" => "required"
        ]);
        $order = Order::find($id);

        if ($request->status == "cancelled") {
            $orderItems = OrderItem::with("product")->where("order_id", $id)->get();
            foreach ($orderItems as $item) {
                $product = Product::find($item->product->id);
                $product->update([
                    "quantity" => $product->quantity + $item->quantity
                ]);
            }
        }

        $order->update([
            "status" => $request->status,
        ]);

        return redirect(route("order.adminIndex"))->with("message", "Başarıyla Güncellendi");
    }

    public function index()
    {
        $userId = auth()->user()->id;
        $orders = Order::where("user_id", $userId)->with("items.product")->get();
        return view("user.order", compact("orders"));
    }


    public function createOrder(OrderCreateRequest $request)
    {
        $userId = auth()->user()->id;
        $cart = Cart::with("items")->where("user_id", $userId)->first();

        $order = Order::create([
            "name" => auth()->user()->name,
            "phone" => $request->phone,
            "address" => $request->address,
            "user_id" => $userId,
            "total" => $cart->total,
            "total_discount" => $cart->discount,
            "base_total" => $cart->basetotal
        ]);
        foreach ($cart->items as $item) {
            OrderItem::create([
                "order_id" => $order->id,
                "product_id" => $item->product->id,
                "quantity" => $item->quantity,
                "product_price" => $item->product->price,
                "product_discounted_price" => $item->product->discounted_price,
            ]);

            $product = Product::find($item->product->id);
            $product->update([
                "quantity" => ($product->quantity - $item->quantity)
            ]);
        }
        $cart->delete();
        return redirect(route("order.index"))->with("message", "Siparişiniz Başarıyla Oluşturuldu");
    }
}
