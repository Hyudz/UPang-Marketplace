<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_profile extends Model
{
    use HasFactory;
    protected $table = 'user_profile';
    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'address',
        'phone',
    ];

    public function user()
    {
        return $this->belongsTo(user_table::class, 'user_id');
    }

    public function order_histories()
    {
        return $this->hasMany(order_history::class, 'seller_id');
    }

    public function order_history()
    {
        return $this->hasMany(order_history::class, 'seller_id');
    }
}
