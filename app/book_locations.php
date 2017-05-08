<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book_locations extends Model
{
    /**
     * Get the phone record associated with the user.
     */
    public $timestamps = false;
    
    public function book()
    {
    	return $this->belongsTo('App\book');
    }
}