<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{

    protected $fillable = [
        'nome', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
