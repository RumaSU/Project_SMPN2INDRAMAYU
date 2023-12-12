<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Salah namespace

class LoginModelsController extends Controller
{
    public function postLogin(Request $request){
        // ->attempt, bukan {...} tapi [...]
        if(Auth::guard('pengguna')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('/homepage');
        }
        else if (Auth::guard('user')->attempt(['email' => $request->email,'password' => $request->password])){
            return redirect('/homepage');
        }

        return redirect('/');
    }

    public function logout() {
        Auth::logout(); // typo bagian sini
        return redirect ('/');
    }
}
