<?php

namespace App;

use App\Notifications\CustomResetPasswordNotification;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    public function sendEmailVerificationNotification()
    {
        $this->notify(new VerifyEmailNotification());
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomResetPasswordNotification($token));
    }
    protected $guard = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','linkedin','cv','image','provider','provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allowed_reviewers()
    {
        return $this->belongsToMany('App\Reviewer', 'allowed_reviewers', 'user_id', 'allowed_reviewer_id');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
