<?php

namespace App\Http\Controllers\Frontend;

use App\Post;
use App\Payment;
use App\Replacement;
use App\Certificate;
use App\TypeReplacement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReplacementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $replacements = Replacement::all();
        $types = TypeReplacement::all();
        return view('replacement.index', compact('replacements', 'types'));
    }

    public function indexpayment()
    {
        //
        return view('replacement.testpayment');
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
        return view('replacement.create', compact('certificate', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
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
        $replacement->date_replacement = $request->input('date_replacement');
        $replacement->reason = $request->input('reason');
        $replacement->remark = $request->input('remark');
        $replacement->type_replacement = $request->input('type');
        $replacement->printed_remark = $certificate->printed_remark;
        $replacement->certificate_id = $id;
        $replacement->old_certificate_number = $cn;
        $replacement->status_old = $certificate->status;
        $replacement->date_printed_old = $certificate->date_print;

        if ($request->input('type') == 'Kesilapan JPK') {
            $replacement->flag_payment = 'Z'; //zero cost - tiada bayaran
            $replacement->flag_lulus = 'Y';
        }

        //post - ade tak?
        $post = Post::where('certificate_id', $id)->count();

        if ($post > 0) {
            $post = Post::where('certificate_id', $id)->first();
            $replacement->post_id = $post->id;
        } else {
            $replacement->post_id = 'tiada';
        }

        //buat agihan semula masukkan dalam senarai agihan - update certificate
        $certificate->flag_printed = 'N';
        $certificate->source = null;
        $certificate->printed_remark = $cetakan;
        $certificate->certificate_number = null;
        $certificate->date_print = '0000-00-00';
        $certificate->qrlink = null;
        $certificate->session = null;
        $certificate->current_status = 'dalam proses percetakan';
        $certificate->save();

        if ($replacement->save()) {
            return redirect('/replacement/epayment/' . $replacement->id)->with('successMessage', 'Maklumat Penggantian Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat penggantian. Sila hubungi Admin');
        }
    }

    public function payNow($id)
    {
        //$certificate = Certificate::findOrFail($id);
        $replacement = Replacement::where('certificate_id', $id)->first();
        return view('replacement.pay', compact('certificate', 'replacement'));
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
            return view('replacement.receipt', compact('replacement'));
        } else {
            return back()->with('errorMessage', 'Tidak');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function show($id, $cn)
    {
        //
        $certificate = Certificate::where('certificate_number', $cn)->where('id', $id)->first();
        return view('replacement.show', compact('certificate'));
    }

    public function showAfter($id, $replaceid)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $replacement = Replacement::findOrFail($replaceid);
        return view('replacement.show-after', compact('certificate', 'replacement'));
    }

    public function list($id)
    {
        //
        $certificates = Certificate::where('ic_number', $id)->get();
        return view('replacement.list', compact('certificates'));
    }

    public function setFlag($flag, $id)
    {
        $replacement = Replacement::findOrFail($id);
        $replacement->flag_lulus = $flag;

        if ($replacement->save()) {
            return redirect('/replacement')->with('successMessage', 'Rekod telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Sila hubungi Admin');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificate $certificate)
    {
        return view("replacement.edit", compact('certificate'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificate $certificate)
    {
        $certificate->name = $request->name;
        $certificate->ic_number = $request->ic_number;
        $certificate->level = $request->level;
        $certificate->programme_code = $request->programme_code;
        $certificate->programme_name = $request->programme_name;
        $certificate->nama_syarikat = $request->nama_syarikat;

        $certificate->save();

        return back()->with('successMessage', 'Maklumat sijil telah dikemaskini');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $replacement = Replacement::findOrFail($id);

        if ($replacement->delete()) {
            return back()->with('successMessage', 'Data telah dihapuskan');
        } else {
            return back()->with('errorMessage', 'Tidak dapat hapuskan data');
        }
    }

    public function payment($id)
    {
        //
        $replacement = Replacement::findOrFail($id);
//        $types = TypeReplacement::all();
        return view('replacement.payment', compact('replacement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /**
     * Display the specified resource.
     *
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */

    public function search()
    {
        //
        return view('replacement.search');
    }

    public function searchResult(Request $request)
    {
        //
        $a = $request->input('ic_number');
        $b = $request->input('batch');
        //dd ($a);
        if ($a <> '') {
            $certificates = Certificate::where('ic_number', 'like', '%' . $a . '%')->get();
        }

        if ($b <> '') {
            $certificates = Certificate::where('batch_id', $b)->orderBy('name', 'asc')->get();
        }

        //dd ($certificates);
        return view('replacement.result', compact('certificates'));
    }
}
