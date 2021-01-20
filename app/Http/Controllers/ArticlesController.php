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
        $article->user_id = $request['user_id'];
        $article->save();
    }

    //Edit Articles

    public function editArticle(Request $request, $article_id){
        $article = Article::where('id', $article_id)->first();
        $article->tittle = $request['tittle'];
        $article->cover_image = $request['cover_image'];
        $article->tumblr= $request['tumblr'];
        $article->body= $request['body'];
        $article->tags= $request['tags'];
        $article->user_id = $request['user_id'];
        $article->update();
    }

    //Delete Articles

    public function deleteArticle(Request $request, $article_id){
        $article = Article::where('id', $article_id)->first();
        $article->delete();
    }

    //Get Articles
    public function getArticles(){
        $article = Article::all();
    }

    // Single Article
    public function getArticle($article_id){
        $article = Article::where('id', $article_id)->first();
        $article->delete();
    }

    // A user's Articles 
    public function userArticles($user_id){
        $articles = Article::where('user_id', $user_id)->get();
    }

}
