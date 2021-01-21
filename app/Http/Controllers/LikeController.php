<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    //create Comment
    public function writeComment(Request $request, $article_id){
        $like = new Like();
        $article = Like::where('id', $article_id)->first();
        if ($article) {
            $like->article_id = $article_id;
            $like->user_id = 1;
            if ($like->save()) {
                return response([$like], 200);
            }
           
            return response([
                "message"=>"Something went wrong"
            ], 200);
        }
        return response([
            "message"=>"Article not found"
        ], 404);
       
    }


    //Delete Comments
    public function deleteComment(Request $request, $like_id){
        $like = Like::where('id', $like_id)->first();
        if ($like) {
            if($like->delete()){
             return response($like);
            }
             return response([
             "message"=>"Something went wrong"
             ], 200);
        }
        return response([
            "message"=>'comment not found'
        ], 404);

        
        
    }

    //Get Article Likes
    public function getComments($article_id){
        $likes = Like::where('article_id', $article_id)->get();
        if($likes) {
            return response($likes);
        }
        return reponse([]);
    }


    // A user's Comments 
    public function userComments($user_id){
        $comments = Comment::where('user_id', $user_id)->get();
    }
}
