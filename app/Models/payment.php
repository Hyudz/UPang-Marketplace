<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'payment_method',
        'payment_status',
        'payment_amount'
    ];

    public function user()
    {
        return $this->belongsTo(user_table::class);
    }

    public function order_history()
    {
        return $this->hasOne(order_history::class);
    }
}
