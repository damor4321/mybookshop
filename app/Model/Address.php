<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    
    protected $fillable = ['user_id', 'address', 'code', 'city', 'phone', 'main'];
}
