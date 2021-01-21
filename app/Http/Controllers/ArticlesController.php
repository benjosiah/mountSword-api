<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    //create Articles
    public function writeArticle(Request $request){
        $article = new Article();
        $article->tittle = $request['tittle'];
        $article->cover_image = $request['cover_image'];
        $article->tumblr= $request['tumblr'];
        $article->body= $request['body'];
        $article->tags= $request['tags'];
        // $article->user_id = $request['user_id'];
        if ($article->save()) {
            return response([$article], 200);
        }
       
        return response([
            "message"=>"Something went wrong"
        ], 200);
    }

    //Edit Articles

    public function editArticle(Request $request, $article_id){
       
        $article = Article::where('id', $article_id)->first();
        if ($article) {
            $article->tittle = $request['tittle']??$article->tittle;
            $article->cover_image = $request['cover_image']??$article->cover_image;
            $article->tumblr= $request['tumblr']??$article->tumblr;
            $article->body= $request['body']??$article->body;
            $article->tags= $request['tags']??$article->tags;
            // $article->user_id = $request['user_id'];
            if($article->update()){
             return response($article);
            }
            return response([
            "message"=>"Something went wrong"
            ], 200);
        }
        return response([
            "message"=>'comment not found'
        ], 404);
      
    }

    //Delete Articles

    public function deleteArticle(Request $request, $article_id){
        $article = Article::where('id', $article_id)->first();
        if ($article) {
            if($article->delete()){

             return response($article);
            }
             return response([
             "message"=>"Something went wrong"
             ], 200);
        }
        return response([
            "message"=>'comment not found'
        ], 404);
    }

    //Get Articles
    public function getArticles(){
        $articles = Article::all();
        if($articles) {
            return response($articles);
        }
        return reponse([]);
    }

    // Single Article
    public function getArticle($article_id){
        $article = Article::where('id', $article_id)->first();
        if ($article) {
            $article->comment;
            return response($article);
        }else{
            return response([
                "message"=>'comment not found'
            ], 404);
        }
    }

    // A user's Articles 
    public function userArticles($user_id){
        $articles = Article::where('user_id', $user_id)->get();
    }

}
