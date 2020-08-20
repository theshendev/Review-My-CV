<?php

namespace App;

use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reviewer extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }

    protected $guard = 'reviewer';

    protected $fillable = [
        'name', 'email', 'password','linkedin','company','position','provider', 'provider_id','image'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}