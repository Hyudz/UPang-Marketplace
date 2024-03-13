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
        'email',
        'password',
        'first_name',
        'last_name',
        'user_type',
        'address',
        'contactNo',
        'gender',
        'birthdate',
    ];

    public function products()
    {
        return $this->hasMany(products::class);
    }


    public function notifications()
    {
        return $this->hasMany(notifications::class);
    }

    public function cart_items()
    {
        return $this->hasMany(cart_items::class);
    }


}
