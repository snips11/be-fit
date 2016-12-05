<?php

namespace App;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Cashier\Billable;
use Fenos\Notifynder\Notifable;
use App\User;


class User extends Authenticatable
{
    use HasApiTokens;
    use Notifable;
    use Billable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'facebook_id', 'avatar', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function account()
    {
        return $this->hasOne('App\account');
    }

     public function updates()
    {
        return $this->hasMany('App\update');
    }

   public function pt_gallery()
    {
        return $this->hasMany('App\pt_gallery');
    }

    public function pt_images()
    {
        return $this->hasMany('App\pt_images');
    }

    /**
     * User following relationship
     */
     // Get all users we are following
    public function follow()
    {
      return $this->belongsToMany('App\User', 'user_follows', 'user_id', 'follow_id')->withTimestamps()->withPivot('id');;;
    }
    // This function allows us to get a list of users following us
    public function followers()
    {
      return $this->belongsToMany('App\User', 'user_follows', 'follow_id', 'user_id')->withTimestamps();;
    }

    public function subscribe()
    {
        return $this->hasMany('App\subscribe');
    }

    public function workout()
    {
        return $this->hasMany('App\workout');
    }

    public function workout_goals()
    {
        return $this->hasMany('App\workout_goals');
    }

    public function workout_training()
    {
        return $this->hasMany('App\Weight_Training_Plans');
    }
    public function isAdmin()
    {
     return $this->admin;
    }

    public function isPro()
    {
     return $this->pro;
    }

}
