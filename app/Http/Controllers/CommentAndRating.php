<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\ProductAnswer;
use App\Models\RatingComment;
use App\Models\ProductQuestion;

class CommentAndRating extends Controller
{
    public function questionComment(Request $request, $id)
    {
        $userId = auth()->user()->id;
        $product = Product::find($id);
        $question =  ProductQuestion::create([
            "product_id" => $product->id,
            "user_id" => $userId,
            "question_comment" => $request->questionComment
        ]);

         $formatDate=date("Y-m-d H:i:s",strtotime($question->created_at));

        return response()->json([
            "message" => "Sorunuz Yayınlandı",
            "question" => $question,
            "name" => auth()->user()->name,
            "formatDate"=>$formatDate
        ]);
    }

    public function resComment(Request $request, $id)
    {
        $userId = auth()->user()->id;
        $answer = ProductAnswer::create([
            "product_question_id" => $id,
            "answer_comment" => $request->answer_comment,
            "user_id" => $userId,
        ]);

        $formatDate=date("Y-m-d H:i:s",strtotime($answer->created_at));


        return response()->json([
            "message" => "Cevabınız Yayınlandı",
            "answer" => $answer,
            "formatDate"=>$formatDate
        ]);
    }

    public function deleteQuestionComment($id)
    {
        ProductQuestion::find($id)->delete();
        return response()->json([
            "message" => "Soru Başarıyla Silindi"
        ]);
    }

    public function ratingComment(Request $request,$id){
        $user=User::find(auth()->user()->id);
       $ratingComment= RatingComment::create([
            "user_id"=>auth()->user()->id,
            "rating"=>$request->rating,
            "rating_comment"=>$request->comment,
            "product_id"=>$id
        ]);

        $formatDate=date("Y-m-d H:i:s",strtotime($ratingComment->created_at));

        return response()->json([
            "message"=>"Değerlendirmeniz Başarıyla Yayınlandı",
            "ratingComment"=>$ratingComment,
            "username"=>$user->name,
            "formatDate"=>$formatDate
        ]);
    }

    public function deleteRatingComment($id){
        RatingComment::find($id)->delete();
        return response()->json([
            "message" => "Değerlendirme Başarıyla Silindi"
        ]);
    }

}
