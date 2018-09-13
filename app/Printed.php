<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Printed extends Model
{
    //
    use SoftDeletes;
    protected $dates = ['date_print'];
}
