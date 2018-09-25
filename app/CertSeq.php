<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CertSeq extends Model
{
    protected $table = 'certseq';
    protected $primaryKey = 'abjad';
    protected $keyType = 'string';
}
