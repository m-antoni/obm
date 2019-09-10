<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
		protected $guarded = [];

    protected $dates = [
				'date', 
    ];

    public function user()
    {
    		return $this->belongsTo('App\User');
    } 
}
