<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
 	  protected $guarded = [];
 	  
 	  public function orders()
 	  {
 	  		return $this->hasMany('App\Order');
 	  }

 	  public function baskets()
 	  {
 	  		return $this->hasMany('App\Basket');
 	  }
}
