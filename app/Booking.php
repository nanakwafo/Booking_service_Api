<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    //

    protected  $fillable=['lastname','firstname','location','email','date','time','message'];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }
}
