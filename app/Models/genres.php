<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class genres extends Model
{
protected $table= 'genres';
protected $fillable = ['name', 'description',];

public function books()
{
    return $this->hasMany(Book::class, 'genres_id');
}
}
