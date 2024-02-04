<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class buyer_profile extends Model
{
    use HasFactory;

    protected $table = 'buyer_profile';

    protected $fillable = [
        'buyer_id',
        'likes',
        'orders',
    ];

}
