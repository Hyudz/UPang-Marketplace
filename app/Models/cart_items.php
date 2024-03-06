<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cart_items extends Model
{
    use HasFactory;

    protected $table = 'cart_items';
    protected $fillable = [
        'user_id',
        'product_id',
        'user_id',
        'quantity'
    ];

    public function product()
    {
        return $this->belongsTo(products::class);
    }

    public function user()
    {
        return $this->belongsTo(user_table::class);
    }
}
