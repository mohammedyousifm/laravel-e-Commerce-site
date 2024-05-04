<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_item extends Model
{
    use HasFactory;
    protected $table = 'cart_item';
    protected $fillable = [
        'name',
        'quantity',
        'price',
        'category_id',
        'prod_id',
        'user_id',
        'image',
    ];
}
