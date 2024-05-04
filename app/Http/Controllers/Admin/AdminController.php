<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Word;
use App\Models\User;
use App\Models\Category;
class AdminController extends Controller
{
    //
    public function index(){
        $allWords = Word::all();
        return view('adm.words', ['words'=>$allWords]);
    }

    public function users(){
        $allUsers = User::all();
        return view('adm.users', ['users'=>$allUsers]);
    }

    public function createCtg(){
        $allCategory = Category::all();
        return view('adm.createCtg', ['categories' => $allCategory]);
    }

    public function addCtg(Request $req){
        $validated = $req->validate([
            'name' => 'required|max:255|unique:categories'
        ]);
        
        Category::create($validated);
       
        return redirect()->route('adm.createCtg');
    }

    public function active(Word $word){
        $word->update([
            'is_active'=> true
        ]);
        return back();

    }

    public function remove(Word $word){
        $word->update([
            'is_active'=> false
        ]);
        return back();

    }
}
