<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property static pdf
 */
class Certificate extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['date_ppl', 'date_print', 'date_post'];
    protected $fillable = ['name', 'ic_number', 'programme_name', 'programme_code', 'type', 'level', 'pb_name',
        'state_id', 'date_ppl', 'result_ppl', 'batch_id', 'address'];

    public function post()
    {
        return $this->belongsTo('App\Post');
    }

    public function replacement()
    {
        return $this->hasMany('App\Replacement');
    }

    public function finance()
    {
        return $this->hasMany('App\Finance');
    }

    public function state() {
        return $this->belongsTo('App\State');
    }
}
