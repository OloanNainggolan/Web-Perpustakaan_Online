<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
protected $table= 'books';
protected $fillable = ['title', 'summary', 'stok', 'genres_id', 'image'];
public function genre()
    {
        return $this->belongsTo(genre::class, 'genres_id');
        
    }
}
//perubahan pertama