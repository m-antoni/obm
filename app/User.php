<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Cache;
use App\SmsGateway;

class User extends Authenticatable
// class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first','middle', 'last','email', 'phone','city','barangay',
        'zipcode','street','password', 'referral_key','referBy'
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return ucfirst($this->first) . ' ' . ucfirst($this->middle) . ' ' . ucfirst($this->last);
    }

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

    public function messages()
    {
        return $this->hasMany('App\Message');
    }

    public function orders()
    {
       return $this->hasMany('App\Order');
    } 

    public function baskets()
    {
       return $this->hasMany('App\Basket');
    }

    public function credits()
    {
        return $this->hasMany('App\Credit');
    }

    public function beem()
    {
        return $this->hasOne('App\Beem');
    }

    public function details()
    {
        return $this->hasMany('App\Detail');
    }

    // public function friendsOfMine()
    // {   
    //     // return the users friends
    //     return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    // }

    // public function friendsOf()
    // {   
    //     // return the users friends who send a friend request
    //     return $this->belongsToMany('App\User', 'friends', 'friend_id', 'user_id');
    // }

    // public function friends()
    // {   
    //     // merge both functions to avoid duplicate users
    //     return $this->friendsOfMine->merge($this->friendsOf);
    // }
}
