<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Word;

class UserController extends Controller
{
    public function index(){
        $user = Auth::user();
      
        $count = $this->countInactiveWords();
        return view('user.index', ['count'=>$count, 'user'=>$user]);
    }

    public function showMyWords(User $user){
        $words = Auth::user()->words()->orderBy('created_at', 'desc')->get();
        $count = $this->countInactiveWords();
        return view('user.mywords', ['allwords'=>$words, 'count'=>$count]);
    }

    public function unactive(){
        $words = Auth::user()->words()->where('is_active', false)->orderBy('created_at', 'desc')->get();
        $count = $this->countInactiveWords();

        return view('user.unactive', ['words'=>$words, 'count'=>$count]);
    }

    private function countInactiveWords()
    {
        if (Auth::check()) {
            return Auth::user()->words->where('is_active', false)->count();
        }

        return 0;
    }

}
