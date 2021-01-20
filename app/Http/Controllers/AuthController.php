<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function Register(Request $request)
    {
        $user = new User();
        $user->name=$request['name'];
        $user->email=$request['email'];
        $user->password=bycrpt($request['password']);
        if($user->save()){
            return response();
        }
        return;
    }

    public function login(Request $request){

        Auth::attempt([
            'email'=> $request['email'], 
            'password'=> $request['password']
        ]);
        
        return response();
    }
}
