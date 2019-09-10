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
        'zipcode','street','password','referral_key','referBy'
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

    public function getNameLastAttribute()
    {
        return ucfirst($this->first) . ' ' . ucfirst($this->last);
    }

    public function getFullAddressAttribute()
    {
        return ucfirst($this->street) . ', ' .  ucfirst($this->barangay) . ', ' . ucfirst($this->city);
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

    public function chatbox()
    {
        return $this->hasOne('App\Chatbox');
    }

    public function referral()
    {
        return $this->hasMany('App\Referral');
    }

    public function orders()
    {
       return $this->hasMany('App\Order');
    } 

    public function credit()
    {
        return $this->hasMany('App\Credit');
    }

    public function details()
    {
        return $this->hasMany('App\Detail');
    }

    public function bills()
    {
        return $this->hasMany('App\BillsPayment');
    }

    public function card()
    {
        return $this->hasOne('App\MasterDebitCard');
    }
}
