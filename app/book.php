<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public $timestamps = false;

    public function User()
    {
    	return $this->belongsTo('App\User');
    }
    public function star(){
        return $this->hasOne('App\star');
    }
    public function tag(){
        return $this->hasMany('App\tag');
    }
}