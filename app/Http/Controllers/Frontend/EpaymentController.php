<?php

namespace App\Http\Controllers\Frontend;

use App\Payment;
use App\Epayment;
use Carbon\Carbon;
use App\Replacement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EpaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Epayment  $epayment
     * @return \Illuminate\Http\Response
     */
    public function show(Epayment $epayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Epayment  $epayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Epayment $epayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Epayment  $epayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Epayment $epayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Epayment  $epayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Epayment $epayment)
    {
        //
    }

    public function replacementChargeProcess(Replacement $replacement)
    {
        $base_url = "http://mohrwallet.mohr.gov.my/vip/";
        $data = [
            'RAMOUNT' => (($replacement->type_replacement == 'hilang') ? "50.00" : "20.00"),
            'RUSERNM' => config('esijil.pg_user'),
            'RPASSWD' => config('esijil.pg_passwd'),
            'RACCODE' => 'TEST2010JKKPPJBH',
            'RRTNPGE' => url('epayment/replacement/' . $replacement->id . '/receipt'),
            'RTXNTYP' => 'FPX',
            'RUNIQID' => 'ABCtestabc123',
            'OTRXNID' => str_random(20),
            'OFLNAME' => $replacement->certificate->name,
            'OCURRCD' => 'MYR',
            'OCEMAIL' => 'norazwin@mohr.gov.my',
            'OCMDTYP' => 'P',
            'ORTNVR0' => $replacement->certificate->ic_number,
            'ORTNVR1' => $replacement->certificate->batch_id,
            'ORTNVR2' => $replacement->id,
            'ORTNVR3' => csrf_token(),
        ];

        //$client = new Client(); //GuzzleHttp\Client
        //$response = $client->post($base_url . "vip.aspx", [
        //    'form_params' => $data,
        //]);

        $url = $base_url . "vip.aspx";

        return view('payment.replacementchargeprocess', compact('replacement', 'url', 'data'));
    }

    public function replacementChargeProcessOut(Replacement $replacement)
    {
        $base_url = "http://mohrwallet.mohr.gov.my/vip/";
        $data = [
            'RAMOUNT' => (($replacement->type_replacement == 'hilang') ? "50.00" : "20.00"),
            'RUSERNM' => config('esijil.pg_user'),
            'RPASSWD' => config('esijil.pg_passwd'),
            'RACCODE' => 'TEST2010JKKPPJBH',
            'RRTNPGE' => url('epayment/ganti/' . $replacement->id . '/receipt'),
            'RTXNTYP' => 'FPX',
            'RUNIQID' => 'ABCtestabc123',
            'OTRXNID' => str_random(20),
            'OFLNAME' => $replacement->certificate->name,
            'OCURRCD' => 'MYR',
            'OCEMAIL' => 'norazwin@mohr.gov.my',
            'OCMDTYP' => 'P',
            'ORTNVR0' => $replacement->certificate->ic_number,
            'ORTNVR1' => $replacement->certificate->batch_id,
            'ORTNVR2' => $replacement->id,
            'ORTNVR3' => csrf_token(),
        ];

        $url = $base_url . "vip.aspx";

        return view('payment.replacementchargeprocess', compact('replacement', 'url', 'data'));
    }

    public function replacementPayingStore(Replacement $replacement, Request $request, Payment $payment)
    {
        $payment = Payment::firstOrCreate(
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

        return view('payment.invoice', ['paymentGatewayResponse' => $request->input(), 'replacement' => $replacement]);
    }
}
