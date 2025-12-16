<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    protected $fillable = ['title', 'summary', 'stok', 'genres_id', 'image'];
    
    public function genre()
    {
        return $this->belongsTo(Genre::class, 'genres_id');
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class, 'book_id');
    }
}