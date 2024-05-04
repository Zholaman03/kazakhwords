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

    protected $fillable = ['author', 'description', 'user_id', 'is_active'];
}
