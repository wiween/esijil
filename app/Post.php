<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['date_post', 'date_receive', 'date_print'];

    // each audit trails record, belong to ONE user only
    public function certificate() {
        return $this->belongsTo('App\Certificate', 'certificate_id');
    }
}
