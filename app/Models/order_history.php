<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_history extends Model
{
    use HasFactory;
    protected $table = 'order_histories';
    protected $fillable = [ 
        'total_amount',
        'payment_id',
        'seller_id',
        'buyer_id',
        'product_id',
        'status'
    ];

    public function payment()
    {
        return $this->belongsTo(payment::class);
    }

    public function product()
    {
        return $this->belongsTo(products::class);
    }

    public function seller()
    {
        return $this->belongsTo(user_table::class, 'seller_id');
    }

    public function buyer()
    {
        return $this->belongsTo(user_table::class, 'buyer_id');
    }
}
