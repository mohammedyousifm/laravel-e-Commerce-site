<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'name',
        'prod_id',
        'description',
        'main_image',
        'price',
        'additional_image',
        'available_Quantity'
    ];
}
