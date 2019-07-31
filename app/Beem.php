<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beem extends Model
{
		 /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id','points', 'used_card','status'
    ];

    public function user()
    {
    		return $this->belongsTo('App\User');
    }
}
