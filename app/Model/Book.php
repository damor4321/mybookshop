<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = 'books';
    
    protected $fillable = ['title', 'author', 'editor', 'price', 'quantity'];
    
    
}
