<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penggantian extends Model
{
    //
    protected $dates = ['date_replacement'];

    public function certificate() {
        return $this->belongsTo('App\Certificate');
    }
}
