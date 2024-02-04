<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment_details extends Model
{
    use HasFactory;
    protected $table = 'payment_details';
    protected $fillable = [
        'user_id',
        'order_id',
        'payment_method',
        'payment_status',
        'payment_date',
        'payment_amount'
    ];
}
