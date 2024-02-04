<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seller_profile extends Model
{
    use HasFactory;
    protected $table = 'seller_profile';
    protected $fillable = [
        'seller_id',
        'likes',
        'listings',
        'orders',
    ];
}
