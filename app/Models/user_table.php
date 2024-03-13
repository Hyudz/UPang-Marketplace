<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Laravel\Sanctum\HasApiTokens;

class user_table extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait, HasApiTokens;

    protected $table = 'user_table';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'user_type',
        'gender',
        'birthday'
    ];

    public function products()
    {
        return $this->hasMany(products::class, 'user_id', 'id');
    }

    public function order_history()
    {
        return $this->hasMany(order_history::class);
    }

    public function notifications()
    {
        return $this->hasMany(notifications::class);
    }

    public function cart_items()
    {
        return $this->hasMany(cart_items::class);
    }

    public function user_profile()
    {
        return $this->hasOne(user_profile::class);
    }

}
