<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likes_table extends Model
{
    use HasFactory;
    protected $table = 'likes_tables';
    protected $fillable = [
        'user_id',
        'product_id',
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
