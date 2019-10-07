<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

 
    protected $table ="users";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'phone','city','address','type','password','image'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function trainee ()
    {
        return $this->hasOne('\App\Trainee' , 'user_id');
    }

    public function center()
    {
        return $this->hasMany('\App\Center' , 'user_id');

    }

    public function courses ()
    {
        return $this->hasMany('\App\Course' ,'user_id');
    }

}
