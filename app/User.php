<?php

namespace App;

use Cartalyst\Sentinel\Users\EloquentUser;
//use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends EloquentUser
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }
}
