<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Word extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function language(){
        return $this->belongsTo(Langugae::class);
    }

    protected $fillable = ['author', 'description', 'user_id', 'is_active', 'category_id', 'language_id'];
}
