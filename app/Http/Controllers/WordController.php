<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Word;
use App\Models\Category;

class WordController extends Controller
{
    public function index(Request $req)
    {

        $words = null;
        if($req->search){
            $words = Word::where('is_active', true)
                     ->where('description', 'LIKE', '%'.$req->search.'%')
                     ->orderBy('updated_at', 'desc')
                     ->get();
        }
        else{

        
        $words = Word::where('is_active', true)
                     ->orderBy('updated_at', 'desc')
                     ->get();

        }
        $search = $req->search;
        $count = $this->countInactiveWords();             

        return view('words.index', compact('words', 'count', 'search'));
    }

    public function wordsByCategory(Category $category)
    {
        $words = $category->words()->where('is_active', true)->orderBy('created_at', 'desc')->get();
        

        return view('words.index', compact('words'));
    }

    public function create()
    {
        $this->authorize('create', Word::class);

        $count = $this->countInactiveWords();
        
        return view('words.create', compact('count'));
    }

    public function edit(Word $word)
    {
        $this->authorize('view', $word);

        $count = $this->countInactiveWords();

        return view('words.edit', compact('word', 'count'));
    }

    public function update(Request $req, Word $word)
    {
        $this->authorize('update', $word);

        $validated = $req->validate([
            'author' => 'required|max:255',
            'description' => 'required|min:7'
        ]);
        
        $word->update($validated+['is_active'=>false]);
       
        return redirect()->route('user.index')->with('message', 'Отправлен на админ чтобы проверить ваша обновление');
    }

    public function store(Request $req)
    {
        $this->authorize('create', Word::class);

        $validate = $req->validate([
            'author' => 'required|max:255',
            'description' => 'required|min:7'
        ]);

        Auth::user()->words()->create($validate);
        
        return back()->with('message', 'Отправлен на админ чтобы проверить');
    }

    public function destroy(Word $word)
    {
        $this->authorize('delete', $word);
        
        $word->delete();

        return back();
    }

    private function countInactiveWords()
    {
        if (Auth::check()) {
            return Auth::user()->words->where('is_active', false)->count();
        }

        return 0;
    }
}
