<?php

namespace App\Models;

use App\Models\User;
use App\Models\comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongTo('User');
    }

    public function comment(){
        return $this->hasMany('App\Models\Comment');
    }

    public function like(){
        return $this->hasMany('App\Models\Like');
    }
}
