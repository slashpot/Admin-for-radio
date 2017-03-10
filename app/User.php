<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as AuthUser;

class User extends AuthUser
{
    protected $fillable = ['name', 'email', 'password'];
    protected $attributes = array(
        'admin' => 0
    );
}
