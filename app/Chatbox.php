<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatbox extends Model
{
    protected $guarded = [];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function message()
    {
        return $this->hasMany('App\Message', 'chat_box_id', 'id');
    }

    protected $dates = [
    	'created_at'
    ];
}
