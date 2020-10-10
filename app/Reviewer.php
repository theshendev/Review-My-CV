<?php

namespace App;

use App\Notifications\CustomResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Reviewer extends Authenticatable implements MustVerifyEmail
{
    use Notifiable,CanResetPassword;
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
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


    public function scopeAvailable($query)
    {
        return $query->where('is_available',1);
    }

    public function scopeOrderByScore($query)
    {
        return $query->orderby('score','desc');
    }

    public function requested_users()
    {
        return $this->belongsToMany('App\User', 'allowed_reviewers',  'allowed_reviewer_id','user_id');
    }
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}