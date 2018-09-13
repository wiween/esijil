<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    //
    use SoftDeletes;
    // each batches record, belong to ONE state only

    public function espkm()
    {
        return $this->hasMany('App\Espkm');
    }

    public function batch()
    {
        return $this->hasMany('App\Batch');
    }
}
