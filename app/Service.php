<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //
    
    protected $fillable=['name'];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function booking()
    {

        return $this->belongsTo('App\Booking');
    }

}
