<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginModelsController extends Controller
{
    public function postLogin(Request $request){
        if(Auth::guard('pengguna')->attampt({'email' => $request->email,'password' => $request password}))){
            return redirect('/homepage');
        }elseif (Auth::guard('user')->attampt({'email' => $reques$request->email,'password' => $request password}))){
            return redirect('/homepage');
        }

        return redirect('/');
    }

    public function logout(){
        Auth::logaut();
            return redirect ('/');

    }
}
