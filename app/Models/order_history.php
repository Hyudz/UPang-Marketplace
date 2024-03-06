<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_history extends Model
{
    use HasFactory;
    protected $table = 'order_histories';
    protected $fillable = [
        'user_id',
        'order_id',
        'total_amount',
        'payment_id',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(user_table::class);
    }

    public function order_item()
    {
        return $this->hasMany(order_item::class);
    }

    public function payment()
    {
        return $this->belongsTo(payment::class);
    }
}
