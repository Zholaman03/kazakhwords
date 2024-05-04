<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Word;
use App\Models\User;

class WordController extends Controller
{
    //
    public function index(){
        
        $count = 0;
        if(Auth::check()){
        $array = Auth::user()->words;
        for($i=0; $i<count($array); $i++){
            if(!$array[$i]->is_active){
                $count++;
            }
        }
        }
    
        $words = Word::where('is_active', true)->get();
        
        
       
        return view('words.index', ['allwords'=>$words, 'count'=>$count]);
    }

    public function myWords(User $user){
        $count = 0;
        if(Auth::check()){
        $array = Auth::user()->words;
        for($i=0; $i<count($array); $i++){
            if(!$array[$i]->is_active){
                $count++;
            }
        }
        }

        $words = Word::where('user_id', $user->id)->where('is_active', false)->get();
        return view('words.myWords', ['allwords'=>$words, 'count'=>$count]);
    }

    public function create(){
        $this->authorize('create', Word::class);

        $count = 0;
        if(Auth::check()){
        $array = Auth::user()->words;
        for($i=0; $i<count($array); $i++){
            if(!$array[$i]->is_active){
                $count++;
            }
        }
        }
        
        return view('words.create', ['count'=>$count]);
    }

    public function edit(Word $word){


        
        $this->authorize('view', $word);

        $count = 0;
        if(Auth::check()){
        $array = Auth::user()->words;
        for($i=0; $i<count($array); $i++){
            if(!$array[$i]->is_active){
                $count++;
            }
        }
        }
        return view('words.edit', ['allWords' => $word, 'count'=>$count]);
    }

    public function update(Request $req, Word $word){
        $this->authorize('update', $word);
        $validated = $req->validate([
            'author' => 'required|max:255',
            'description' => 'required|min:7'
        ]);
        
        $word->update($validated+['is_active'=>false]);
       
        return redirect()->route('words.index')->with('message', 'Отправлен на админ чтобы проверить ваша обновление');
    }

    public function store(Request $req){
        $this->authorize('create', Word::class);
       $validate = $req->validate([
            'author' => 'required|max:255',
            'description' => 'required|min:7'
        ]);

        
            // Word::create($validate+['user_id'=>Auth::user()->id]);
        Auth::user()->words()->create($validate);
        
        return redirect()->route('words.index')->with('message', 'Отправлен на админ чтобы проверить');
    }

    public function destroy(Word $word){

        $this->authorize('delete', $word);
        $word->delete();
        return back();
    }
}
