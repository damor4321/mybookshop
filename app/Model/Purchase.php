<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $table = 'purchases';
    
    protected $fillable = ['user_id', 'book_id', 'title', 'author', 'editor', 'price', 'quantity', 'total'];
    
}
