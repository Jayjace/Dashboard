<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // Define the table if it's not the plural form of the model name
    protected $table = 'items'; 

    // Define the fillable fields
    protected $fillable = ['name', 'price'];
}
