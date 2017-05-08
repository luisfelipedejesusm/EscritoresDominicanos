<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class star extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public $timestamps = false;
    
    public function book()
    {
    	return $this->belongsTo('App\book');
    }
    public function User(){
    	return $this->belongsTo('App\User');
    }
}