<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
      //create Comment
      public function writeComment(Request $request){
        $comment = new Comment();
        $comment->article_id = $request['article_id'];
        $comment->body= $request['body'];
        // $comment->user_id = $request['user_id'];
        $comment->save();
        return response([$comment], 200);
    }

    //Edit Comments

    public function editComment(Request $request, $comment_id){
        $comment = Comment::where('id', $comment_id)->first();
        $comment->body= $request['body'];
        $comment->update();
        return response($comment);
    }

    //Delete Comments

    public function deleteComment(Request $request, $comment_id){
        $comment = Comment::where('id', $comment_id)->first();
        $comment->delete();
        return response($comment);
    }

    //Get Article Comments
    public function getComments($aticle_id){
        $comment = Comment::where('id', $comment_id)->first();
        return response($comments);
    }

    // Single Comment
    public function getComment($comment_id){
        $comment = Comment::where('id', $comment_id)->first();
        return response($comment);
    }

    // A user's Comments 
    public function userComments($user_id){
        $comments = Comment::where('user_id', $user_id)->get();
    }
}
