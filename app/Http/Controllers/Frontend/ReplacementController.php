<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Replacement;
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
        return view('replacement.create', compact('certificate','types'));
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
        $countreplacement = Replacement::where('id', $id)->where('old_certificate_number', $cn)->count();
//        echo $countreplacement;
//        exit();
        if ($countreplacement == 0){
            $cetakan = "cetakan kedua";
        } elseif ($countreplacement == 1) {
            $cetakan = "cetakan ketiga";
        } elseif ($countreplacement == 2) {
            $cetakan = "cetakan keempat";
        }
        elseif ($countreplacement == 3) {
            $cetakan = "cetakan kelima";
        }
        elseif ($countreplacement == 4) {
            $cetakan = "cetakan keeenam";
        }
        elseif ($countreplacement == 5) {
            $cetakan = "cetakan ketujuh";
        }
        elseif ($countreplacement == 6) {
            $cetakan = "cetakan kelapan";
        }
        elseif ($countreplacement == 7) {
            $cetakan = "cetakan kesembilan";
        }
        elseif ($countreplacement == 8) {
            $cetakan = "cetakan kesepuluh";
        }

        $replacement = new Replacement();
        $replacement->date_replacement = $request->input('date_replacement');
        $replacement->reason = $request->input('reason');
        $replacement->remark = $request->input('remark');
        $replacement->type_replacement = $request->input('type');
        $replacement->printed_remark = $cetakan;
        $replacement->certificate_id = $id;
        $replacement->old_certificate_number = $cn;

        if ($replacement->save()) {
            return redirect('/replacement/payment/' . $id)->with('successMessage', 'Maklumat Penggantian Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat penggantian. Sila hubungi Admin');
        }
    }

    public function payNow()
    {
        return view('replacement.pay');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $certificates = Certificate::where('ic_number', $id)->get();
        return view('replacement.list', compact('certificates'));
    }

    public function list($id)
    {
        //
        $certificates = Certificate::where('ic_number', $id)->get();
        return view('replacement.list', compact('certificates'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function edit(Replacement $replacement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Replacement $replacement)
    {
        //
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

        if($replacement->delete()) {
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
    public function storePayment(Request $request, $id, $cn)
    {
//        return $request->all();
//        return $id;
        $countreplacement = Replacement::where('id', $id)->where('old_certificate_number', $cn)->count();
//        echo $countreplacement;
//        exit();
        if ($countreplacement == 0){
            $cetakan = "cetakan kedua";
        } elseif ($countreplacement == 1) {
            $cetakan = "cetakan ketiga";
        } elseif ($countreplacement == 2) {
            $cetakan = "cetakan keempat";
        }
        elseif ($countreplacement == 3) {
            $cetakan = "cetakan kelima";
        }
        elseif ($countreplacement == 4) {
            $cetakan = "cetakan keeenam";
        }
        elseif ($countreplacement == 5) {
            $cetakan = "cetakan ketujuh";
        }
        elseif ($countreplacement == 6) {
            $cetakan = "cetakan kelapan";
        }
        elseif ($countreplacement == 7) {
            $cetakan = "cetakan kesembilan";
        }
        elseif ($countreplacement == 8) {
            $cetakan = "cetakan kesepuluh";
        }

        $replacement = new Replacement();
        $replacement->date_replacement = $request->input('date_replacement');
        $replacement->reason = $request->input('reason');
        $replacement->remark = $request->input('remark');
        $replacement->type_replacement = $request->input('type');
        $replacement->printed_remark = $cetakan;
        $replacement->certificate_id = $id;
        $replacement->old_certificate_number = $cn;

        if ($replacement->save()) {
            return redirect('/replacement')->with('successMessage', 'Maklumat Penggantian Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat penggantian. Sila hubungi Admin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Replacement  $replacement
     * @return \Illuminate\Http\Response
     */
}
