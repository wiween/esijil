<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Espkm extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['date_ppl', 'date_print'];

   public function state() {
        return $this->belongsTo('App\State');
    }
}
