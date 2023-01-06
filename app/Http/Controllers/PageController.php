<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use App\Models\SubCategory;

use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Models\ProductQuestion;
use App\Models\RatingComment;

use function PHPSTORM_META\map;

class PageController extends Controller
{

    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $products = Product::latest()->filter(request(["search", "category"]))->with("category")
            ->where("status", "publish")->paginate(12);

        $mainCategories = MainCategory::with("subCategories")->get();
        return view('home', compact("products", "mainCategories"));
    }

    public function productDetail($id)
    {
        $product = Product::find($id);
        $canRatingComment = false;

        if (auth()->user()) {
            $deliveredOrders = Order::with("items")->where("user_id", auth()->user()->id)->where("status", "delivered")->get();
            if ($deliveredOrders) {
                foreach ($deliveredOrders as $order) {
                    foreach ($order->items as $item) {
                        if ($item->product_id == $id) {
                            $ratingComment = RatingComment::where("user_id", auth()->user()->id)->where("product_id", $id)->first();
                            if (!$ratingComment) {
                                $canRatingComment = true;
                            }
                        }
                    }
                }
            }
        }

        $questions = ProductQuestion::latest()->with("user")->with("response")->where("product_id", $id)->paginate(4, ["*"], "questions");
        $ratingComments = RatingComment::latest()->with("user")->where("product_id", $id)->paginate(4, ["*"], "ratings");
        $rating = 0;
        $count = count($ratingComments);
        if ($count > 0) {
            foreach ($ratingComments as $comment) {
                $rating += $comment->rating;
            }
            $rating = (round($rating / $count));
        }
        return view("user.productDetail", compact("product", "questions", "canRatingComment", "ratingComments", "rating", "count"));
    }
}
