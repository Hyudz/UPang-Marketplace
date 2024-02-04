<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_contact extends Model
{
    use HasFactory;
    protected $table = 'user_contact';
    protected $fillable = [
        'user_id',
        'contact_number',
        'address',
        'city',
        'province',
        'profile_picture',
    ];
}
