<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'transaction_id',
        'receipt_no',
        'flag',
        'payment_date',
        'transaction_type',
        'replacement_id',
    ];
}
