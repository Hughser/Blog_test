<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'provider',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('App\Model\Article');
    }

    public function message()
    {
        return $this->hasOne('App\Model\Message');
    }

    public static function is_Account($email, $provider)
    {
        return self::where('email', $email)->where('provider', $provider)->first();
    }

    public function isUser($user_id)
    {
        return ($this->id == $user_id);
    }

    public function isAdmin()
    {
      return ($this->type == 1);
    }
}
