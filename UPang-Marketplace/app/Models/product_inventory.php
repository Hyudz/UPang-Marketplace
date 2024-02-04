<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_inventory extends Model
{
    use HasFactory;
    protected $table = 'product_inventory';
    protected $fillable = [
        'product_id',
        'product_quantity',
        'created_at',
        'modified_at'
    ];
}
