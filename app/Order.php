<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $dates = [
		'date', 
    ];

    // unserialize the cart data
    // public function getCartAttribute($value)
    // {
    //     return unserialize($value);
    // }

   public function getFullNameAttribute()
    {
        return ucfirst($this->first) . ' ' . ucfirst($this->middle) . ' ' . ucfirst($this->last);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    } 

    public function baskets()
    {
        return $this->hasMany('App\Basket');
    } 
}
