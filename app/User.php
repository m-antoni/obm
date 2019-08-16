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

    /**
     * This will get the cache OTP on the cache driver
    */
    public function cacheTheOTP()
    {
        $OTP =  'ONE BEEM CODE: ' . rand(100000, 999999);
        
        Cache::put(['OTP' => $OTP], now()->addSeconds(20));

        return $OTP;
    }

    public function sendOTP()
    {   
        // SMS Gateway Credentials Needed
        $token = env('SMS_TOKEN');
        $devide_id = env('SMS_DEVICE_ID');
        $options = [];

        $smsGateway = new SmsGateway($token);
        $result = $smsGateway->sendMessageToNumber($this->phone, $this->cacheTheOTP(), $devide_id, $options);
    }

    public function orders()
    {
       return $this->hasMany('App\Order');
    } 

    public function baskets()
    {
       return $this->hasMany('App\Basket');
    }

    public function cards()
    {
        return $this->hasMany('App\Card');
    }

    public function beem()
    {
        return $this->hasOne('App\Beem');
    }

    public function details()
    {
        return $this->hasMany('App\Detail');
    }
}
