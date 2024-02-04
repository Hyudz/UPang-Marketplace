<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_details extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $fillable = [
        'user_id',
        'total_price',
        'payment_id',
        'status'
    ];
}
