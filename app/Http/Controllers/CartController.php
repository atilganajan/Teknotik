<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function index()
    {

        $cart = Cart::with("user", "items.product")->where("user_id", auth()->user()->id)->first();
        return view("user.cart", compact("cart"));
    }

    public function addToCart(Request $request, $id)
    {
            // Alternatif 
        // $userId = auth()->user()->id;
        // $productId = $request->post('product_id');
        // $quantity = $request->post('quantity');

        // $cart = Cart::firstOrCreate(['user_id' => $userId]);
        // $cartItem = CartItem::firstOrNew([
        //     'cart_id' => $cart->id,
        //     'product_id' => $productId,
        // ]);
        // $cartItem->quantity += $quantity;
        // $cartItem->save();
        // return redirect()->route('cart.index');
             // -------

        $userId = auth()->user()->id;

        if (!(count((Cart::where("user_id", $userId)->get())) == 1)) {

            Cart::create([
                "user_id" => auth()->user()->id
            ]);
        }

        $cart = Cart::where("user_id", $userId)->first();

        if (count(CartItem::get()) > 0) {

            if (count(CartItem::where("product_id", $id)->Where("cart_id", $cart->id)->get()) == 1) {
                $cartItem =  CartItem::where("product_id", $id)->Where("cart_id", $cart->id)->first();

                  CartItem::where("product_id", $id)->Where("cart_id", $cart->id)->update([
                    "quantity" => $cartItem->quantity + 1
                ]);
            } else {
                CartItem::create([
                    "cart_id" => $cart->id,
                    "product_id" => $id,
                    "quantity" => 1
                ]);
                return response()->json(["message"=>"Ürün Başarıyla Sepetinize Eklendi"]);
            }
        } else {
            CartItem::create([
                "cart_id" => $cart->id,
                "product_id" => $id,
                "quantity" => 1
            ]);
            return response()->json(["message"=>"Ürün Başarıyla Sepetinize Eklendi"]);
        }
        return response()->json([
            "message"=>"Ürün Başarıyla Sepetinize Eklendi",
            "cartItemQuantity"=>$cartItem->quantity,
            "total"=>$cart->total,
            "totalDiscount"=>$cart->discount,
            "baseTotal"=>$cart->basetotal
            
        ]);
    }

    public function removeCartItemOne($id)
    {
        $userId = auth()->user()->id;
        $cart = Cart::where("user_id", $userId)->first();
        $cartItem = CartItem::where("product_id", $id)->where("cart_id", $cart->id)->first();


        if ($cartItem->quantity == 1) {
            $cartItem->delete();
            $cartItemCount= count(CartItem::where("cart_id", $cart->id)->get());
            if($cartItemCount==0){
                $cart->delete();
                return response()->json([
                    "message"=>"Sepetiniz Boş",
                    "isEmpty"=>true
                ]);
               }

            return response()->json([
                "removedProductId" => $id,
                "cartItemQuantity"=>$cartItem->quantity,
                "total"=>$cart->total,
                "totalDiscount"=>$cart->discount,
                "baseTotal"=>$cart->basetotal,
                "isEmpty"=>false
            ]);
        }

        $cartItem->update([
            "quantity" => $cartItem->quantity - 1
        ]);

        return response()->json([
            "message"=>"Ürün Başarıyla Sepetinize Eklendi",
            "cartItemQuantity"=>$cartItem->quantity,
            "total"=>$cart->total,
            "totalDiscount"=>$cart->discount,
            "baseTotal"=>$cart->basetotal,
            "isEmpty"=>false
        ]);
    }

    public function removeCartItem($id){
        $userId = auth()->user()->id;
        $cart = Cart::where("user_id", $userId)->first();
        $cartItem = CartItem::where("product_id", $id)->where("cart_id", $cart->id)->first();
        $cartItem->delete();

       $cartItemCount= count(CartItem::where("cart_id", $cart->id)->get());

       if($cartItemCount==0){
        $cart->delete();
        return response()->json([
            "message"=>"Sepetiniz Boş",
            "isEmpty"=>true
        ]);
       }

        return response()->json([
            "message"=>"Ürün Sepetinizden Çıkarıldı",
            "total"=>$cart->total,
            "totalDiscount"=>$cart->discount,
            "baseTotal"=>$cart->basetotal,
            "isEmpty"=>false
        ]);
    }

}
