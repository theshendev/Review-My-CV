<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reviewer extends Authenticatable
{
    use Notifiable;

    protected $guard = 'reviewer';

    protected $fillable = [
        'name', 'company_email', 'password','phone','company'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}