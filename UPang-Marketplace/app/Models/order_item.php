<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_item extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $fillable = [
        'product_id',
        'quantity',
    ];

    public function product()
    {
        return $this->belongsTo(products::class);
    }

    public function payment()
    {
        return $this->hasOne(payment::class);
    }

    public function order_history()
    {
        return $this->hasOne(order_history::class);
    }


}
