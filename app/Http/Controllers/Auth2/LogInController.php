<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogInController extends Controller
{

    public function login(){
        return view('auth.login');
    }

    public function loginForm(Request $req){
        if(Auth::check()){
            return redirect()->intended('/words');
        }

        $validated = $req->validate([
            'email'=>'required|email',
            'password'=>'required|string'
        ]);
        if(Auth::attempt($validated))
        {
            if(Auth::user()->role->name == "admin"){
                return redirect()->intended('/admin');
            }
            return redirect()->intended('/myprofile');
        }

        return redirect()->back()->withErrors('Неправильный пароль или логин!!');
    }


    public function logout(){
        Auth::logout();

        return redirect()->route('words.index');
    }
}
