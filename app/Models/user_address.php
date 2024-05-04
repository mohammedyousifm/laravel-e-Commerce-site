<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_address extends Model
{
    use HasFactory;
    protected $table = 'user_addresses';
    protected $fillable = [
        'name',
        'phonenumber',
        'state',
        'address',
        'address_type',
        'pincode',
        'user_id',
    ];
}
