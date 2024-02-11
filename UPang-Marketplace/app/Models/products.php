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
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(user_table::class, 'user_id');
    }

    public function order_item()
    {
        return $this->hasMany(order_item::class);
    }

    public function categories()
    {
        return $this->hasMany(categories::class);
    }

    public function department()
    {
        return $this->hasOne(department::class);
    }

    public function likes()
    {
        return $this->hasMany(likes_table::class);
    }

    public function cart_items(){
        return $this->hasMany(cart_items::class);
    }


}
