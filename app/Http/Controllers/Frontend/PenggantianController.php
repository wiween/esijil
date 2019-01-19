<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Payment;
use App\Penggantian;
use App\Post;
use App\Replacement;
use App\TypeReplacement;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenggantianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('student-replacement.index');
    }

    public function carian(Request $request)
    {
        //
        $ic_number = $request->input('ic_number');
        $batch = $request->input('batch');

        if ($ic_number <> '' && $batch <> '') {
            $exist = Certificate::where('certificates.ic_number', $ic_number)->where('certificates.batch_id', $batch)->where('flag_printed', 'Y')->count();
            if ($exist <= 0) {
                return view('student-replacement.noresult');
            } else {
                $certificates = Certificate::where('certificates.ic_number', $ic_number)->where('certificates.batch_id', $batch)->where('flag_printed', 'Y')->get();
//                dd($certificate);
                return view('student-replacement.result', compact('certificates'));
            }
        } else if ($ic_number <> '' && $batch == '') {
            $exist = Certificate::where('certificates.ic_number', $ic_number)->where('flag_printed', 'Y')->count();
            if ($exist <= 0) {
                return view('student-replacement.noresult');
            } else {
                $certificates = Certificate::where('certificates.ic_number', $ic_number)->where('flag_printed', 'Y')->get();
//                dd($certificates);
                return view('student-replacement.result-ic', compact('certificates'));
            }
        } else if ($ic_number == '' && $batch <> '') {

            //exist
            $exist = Certificate::where('certificates.batch_id', $batch)->where('flag_printed', 'Y')->count();

            if ($exist <= 0) {
                return view('student-replacement.noresult');
            } else {
                $certificates = Certificate::where('certificates.batch_id', $batch)->where('flag_printed', 'Y')->get();
                return view('student-replacement.result-batch', compact('certificates'));
            }

        } else {
            return view('status.noresult');
        }

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id, $cn)
    {
        //
        $certificate = Certificate::where('id', $id)->where('certificate_number', $cn)->first();
        $types = TypeReplacement::all();
        return view('student-replacement.create', compact('certificate', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id, $cn)
    {
//        return $request->all();
//        return $id;
        $countreplacement = Replacement::where('certificate_id', $id)->where('old_certificate_number', $cn)->count();
        //return $countreplacement;
//        exit();
        if ($countreplacement == 0) {
            $cetakan = "cetakan kedua";
        } elseif ($countreplacement == 1) {
            $cetakan = "cetakan ketiga";
        } elseif ($countreplacement == 2) {
            $cetakan = "cetakan keempat";
        } elseif ($countreplacement == 3) {
            $cetakan = "cetakan kelima";
        } elseif ($countreplacement == 4) {
            $cetakan = "cetakan keeenam";
        } elseif ($countreplacement == 5) {
            $cetakan = "cetakan ketujuh";
        } elseif ($countreplacement == 6) {
            $cetakan = "cetakan kelapan";
        } elseif ($countreplacement == 7) {
            $cetakan = "cetakan kesembilan";
        } elseif ($countreplacement == 8) {
            $cetakan = "cetakan kesepuluh";
        }

        //copy yag lama dalam replacement

        // select dulu certificate
        $certificate = Certificate::where('id', $id)->where('certificate_number', $cn)->first();
//        echo $certificate;
//        exit();


        $replacement = new Replacement();
        $replacement->date_replacement = Carbon::now();
        $replacement->reason = $request->input('reason');
        $replacement->remark = $request->input('remark');
        $replacement->type_replacement = $request->input('type');
        $replacement->printed_remark = $certificate->printed_remark;
        $replacement->certificate_id = $id;
        $replacement->old_certificate_number = $cn;
        $replacement->status_old = $certificate->status;
        $replacement->date_printed_old =  $certificate->date_print;

        if ($request->input('type') == 'Kesilapan JPK') {
            $replacement->flag_payment = 'Z'; //zero cost - tiada bayaran
            $replacement->flag_lulus = 'Y';
        }

        //post - ade tak?
        $post = Post::where('certificate_id', $id)->count();

        if($post > 0) {
            $post = Post::where('certificate_id', $id)->first();
            $replacement->post_id =  $post->id;
        }else {
            $replacement->post_id = 'tiada';
        }

        //buat agihan semula masukkan dalam senarai agihan - update certificate
        $certificate->flag_printed = 'N';
        $certificate->source = null;
        $certificate->printed_remark = $cetakan;
        $certificate->certificate_number = null;
        $certificate->date_print = null;
        $certificate->qrlink = null;
        $certificate->session = null;
        $certificate->current_status = 'dalam proses percetakan';
        $certificate->save();

        if ($replacement->save()) {
            return redirect('/ganti/epayment/' . $replacement->id)->with('successMessage', 'Maklumat penggantian telah disimpan dan dihantar untuk pengesahan. Sila buat bayaran jika berkaitan');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat penggantian. Sila hubungi Admin');
        }
    }

    public function payNow($id)
    {
        //$certificate = Certificate::findOrFail($id);
        $replacement = Replacement::findOrFail($id);
        //return $replacement;
        return view('student-replacement.pay', compact('replacement'));
    }

    public function receipt($id)
    {
        //
        $replacement = Replacement::findOrFail($id);

        //update flag bayaran Y
        $replacement->flag_payment = 'Y';
        $replacement->save();

        //insert table payment
        $payment = new Payment();
        $payment->transaction_id = '1';
        $payment->replacement_id = $id;
        $payment->receipt_no = '2';
        $payment->payment_date = now();
        $payment->transaction_type = 'FPX';
        $payment->save();

        if ($payment->save()) {
            return view('student-replacement.receipt', compact('replacement'));
        } else {
            return back()->with('errorMessage', 'Tidak');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penggantian $penggantian
     * @return \Illuminate\Http\Response
     */
    public function show(Penggantian $penggantian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penggantian $penggantian
     * @return \Illuminate\Http\Response
     */
    public function edit(Penggantian $penggantian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Penggantian $penggantian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penggantian $penggantian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penggantian $penggantian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penggantian $penggantian)
    {
        //
    }
}
