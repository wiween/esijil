<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    //
    public function certificate() {
        return $this->belongsTo('App\Certificate');
    }
}
