<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;
    protected $table = 'department';
    protected $fillable = [
        'department_name',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
