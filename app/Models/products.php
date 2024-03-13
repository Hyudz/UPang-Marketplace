<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $fillable = [
        'name',
        'description',
        'image',
        'price',
        'availability',
        'quantity',
        'category',
        'user_id',
        'message'
    ];

    public function user()
    {
        return $this->belongsTo(user_table::class);
    }

    public function cart_items(){
        return $this->hasMany(cart_items::class);
    }


}
