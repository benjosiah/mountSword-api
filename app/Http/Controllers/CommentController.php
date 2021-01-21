<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Article;
use Illuminate\Http\Request;

class CommentController extends Controller
{
      //create Comment
      public function writeComment(Request $request, $article_id){
        $comment = new Comment();
        $article = Article::where('id', $article_id)->first();
        if ($article) {
            $comment->article_id = $article_id;
            $comment->body= $request['body'];
            $comment->user_id = 1;
            if ($comment->save()) {
                return response([$comment], 200);
            }
           
            return response([
                "message"=>"Something went wrong"
            ], 200);
        }
        return response([
            "message"=>"Article not found"
        ], 404);
       
    }

    //Edit Comments

    public function editComment(Request $request, $comment_id){
        $comment = Comment::where('id', $comment_id)->first();
        if ($comment) {
            $comment->body= $request['body'];
            if($comment->update()){
             return response($comment);
            }
            return response([
            "message"=>"Something went wrong"
            ], 200);
        }
        return response([
            "message"=>'comment not found'
        ], 404);
      
    }

    //Delete Comments

    public function deleteComment(Request $request, $comment_id){
        $comment = Comment::where('id', $comment_id)->first();
        if ($comment) {
            if($comment->delete()){
             return response($comment);
            }
             return response([
             "message"=>"Something went wrong"
             ], 200);
        }
        return response([
            "message"=>'comment not found'
        ], 404);

        
        
    }

    //Get Article Comments
    public function getComments($article_id){
        $comments = Comment::where('article_id', $article_id)->get();
        if($comments) {
            return response($comments);
        }
        return reponse([]);
    }

    // Single Comment
    public function getComment($comment_id){
        $comment = Comment::where('id', $comment_id)->first();
        if ($comment) {
            $comment->article;
            return response($comment);
        }else{
            return response([
                "message"=>'comment not found'
            ], 404);
        }
       
    }

    // A user's Comments 
    public function userComments($user_id){
        $comments = Comment::where('user_id', $user_id)->get();
    }
}
