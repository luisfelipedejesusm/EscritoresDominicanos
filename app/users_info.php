<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class users_info extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public $timestamps = false;
    public function User()
    {
    	return $this->belongsTo('App\User');
    }
}