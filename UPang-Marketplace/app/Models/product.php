<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'product_name',
        'product_description',
        'product_price',
        'product_category',
        'product_image',
        'created_at',
        'modified_at',
        'product_quantity',
        'seller_id',
        'product_status',
        'product_likess'
    ];
}
