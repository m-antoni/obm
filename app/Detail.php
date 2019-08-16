<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
   	protected $guarded = [];
   	
    protected $dates = [
      'date', 
    ];

   //  public function setIsDefaultAttribute($value)
  	// {
  	//     return $this->attributes['value'] = isset($value)?1:0;
  	// }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
