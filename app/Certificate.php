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
    protected $dates = ['date_print', 'date_post', 'date_receive', 'tarikh_mesy_ndt'];
    protected $fillable = [
        'name', 'ic_number', 'programme_name',
        'programme_code', 'type', 'level',
        'kod_pusat', 'pb_name', 'state_id',
        'date_ppl', 'result_ppl', 'batch_id',
        'address', 'tarikh_ppl', 'nama_syarikat',
        'negeri_syarikat', 'ndt_sah_mula', 'ndt_sah_tamat',
        'tarikh_ndt_terdahulu', 'tarikh_mesy_ndt', 'nama_program_terdahulu',
        'no_sijil_dahulu', 'tarikh_sijil_baru_mula', 'jenis_sijil',
    ];

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
