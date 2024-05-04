<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WordController;
use App\Http\Controllers\Auth2\SignUpController;
use App\Http\Controllers\Auth2\LoginController;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function(){
    return redirect()->route('words.index');
});

Route::middleware('auth')->group(function(){
    Route::get('/words/create', [WordController::class, 'create'])->name('words.create');
    Route::get('/words/{word}/edit', [WordController::class, 'edit'])->name('words.edit');
    Route::post('/words', [WordController::class, 'store'])->name('words.store');
    Route::get('words/{user}/mywords', [WordController::class, 'myWords'])->name('words.myWords');
    Route::delete('/words/{word}', [WordController::class, 'destroy'])->name('words.destroy');
    Route::put('/words/{word}', [WordController::class, 'update'])->name('words.update');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::middleware('hasrole:admin')->group(function(){
        Route::get('/admin', [AdminController::class, 'index'])->name('adm.index');
        Route::get('/admin/createCtg', [AdminController::class, 'createCtg'])->name('adm.createCtg');
        Route::post('/admin/createCtg', [AdminController::class, 'addCtg'])->name('adm.addCtg');
        Route::put('/admin/{word}/active', [AdminController::class, 'active'])->name('adm.active');
        Route::put('/admin/{word}/remove', [AdminController::class, 'remove'])->name('adm.remove');
        Route::get('/admin/users', [AdminController::class, 'users'])->name('adm.users');
    });
});

Route::get('/words', [WordController::class, 'index'])->name('words.index');



Route::get('/signup', [SignUpController::class, 'create'])->name('signup.form');
Route::post('/signup', [SignUpController::class, 'store'])->name('register');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'loginForm'])->name('login.form');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
