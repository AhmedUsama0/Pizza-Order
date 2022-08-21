<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

//it is automatically connected with the pizza table
class Pizza extends Model
{
    use HasFactory;

    protected $fillable = ["name", "type", "base", "toppings"];
}
