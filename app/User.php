<?php

namespace App;

use App\Traits\Friendable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\profile;
use Cache;

class User extends Authenticatable
{
    use Notifiable;

    use Friendable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'slug', 'gender', 'pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function profile() {
      return $this->hasOne('App\profile');
  }

public function isOnline()
{
  return Cache::has('active-user' . $this->id);
}

public function friends()
{
  return $this->belongsTo('App\friendships', 'id', 'requester');
}
}
