<?php

namespace App\Http\Controllers\Auth2;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(Request $req){
        $validated = $req->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6|confirmed'
        ]);



        $user = User::create([
            'name'=>$req->input('name'),
            'email'=>$req->input('email'),
            'password'=>Hash::make($req->input('password')),
            'role_id'=>Role::where('name', 'user')->first()->id
        ]);

        Auth::login($user);

        return redirect()->route('words.index');
    }
}
