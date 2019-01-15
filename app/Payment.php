<?php

namespace App;

use Carbon\Carbon;
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

    public function storePayment($request, $replacement)
    {
        self::firstOrCreate(
            [
                'transaction_id' => $request->input('ITRXNID'),
                'receipt_no' => $request->input('IRECPTNO')
            ],
            [
                'flag' => $request->input('IFSTATUS'),
                'payment_date' => Carbon::createFromFormat('d/m/Y H:i:s', $request->input('IDATETXN'))->toDateTimeString(),
                'transaction_type' => $replacement->type_replacement,
                'replacement_id' => $replacement->id,
            ]
        );
    }
}
