<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Finance;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class FinanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $certificates = Certificate::where('flag_printed', 'Y')->where('source', 'syarikat')
            ->orderBy('name', 'asc')->groupBy('batch_id')->get();
        return view('finance.index', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($batch)
    {
         $certificate = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->where('source', 'syarikat')
                    ->orderBy('name', 'asc')->groupBy('batch_id')->first();
         return view('finance.create', compact('certificate'));
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
        $certificate = Certificate::findOrFail($id);
        if ($request->input('received') == 'N') {
            $certificate->current_status = 'telah dipos';
        }
        else if ($request->input('received') == 'Y'){
            $certificate->current_status = 'telah diterima';
        }
        else {
            $certificate->current_status = 'dalam proses percetakan';
        }
        $certificate->save();

        $post = new Post();
        $post->date_post = $request->input('date_post');
        $post->date_receive = $request->input('date_receive');
        $post->tracking_number = $request->input('tracking_number');
        $post->post_company = $request->input('post_company');
        $post->receiver = $request->input('receiver');
        $post->flag_received = $request->input('received');
        $post->remark = $request->input('remark');
        $post->certificate_id = $id;

        if ($post->save()) {
            return redirect('post')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }
    }

    public function storeBatch(Request $request, $batch)
    {
        //store student - no just batch tu
//        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->get();

//        foreach($certificates as $certificate) {

            $finance = new Finance();
//            $finance->certificate_id = $certificate->id;
            $finance->batch_id = $batch;
            $finance->finance_remark = $request->input('received');
            $finance->reason = $request->input('reason');
            $finance->updated_by = Auth::user()->email;
            $finance->save();
//        }


        if ($finance->save()) {
            return redirect('/finance/confirm')->with('successMessage', 'Maklumat Telah Dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak boleh simpan maklumat. Sila hubungi Admin');
        }

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function show(Finance $finance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function edit(Finance $finance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Finance $finance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Finance  $finance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Finance $finance)
    {
        //
    }

    public function list()
    {
        //
        $finances = Finance::all();
        return view('finance.index', compact('finances'));
    }

    public function showFReport($batch, $type)
    {
        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->orderBy('name', 'asc')
            ->where('source', 'syarikat')->where('type',$type)->get();
        $siries_number = Certificate::distinct('session')->where('batch_id', $batch)->where('type',$type)->groupBy('session')->first();
        $pdf = PDF::loadView('report.f', compact('certificates', 'siries_number'))->setPaper('a4', 'landscape');
        //return $pdf->download('report.pdf');
        return $pdf->stream('F.pdf');
    }

    public function showGReport($batch, $type)
    {
        $siries_number = Certificate::distinct('session')->where('batch_id', $batch)->where('type',$type)->groupBy('session')->first();
        $finance = Finance::where('batch_id', $batch)->count();

        if($finance > 0) {

            $finances = Finance::where('batch_id', $batch)->first();
            $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->orderBy('name', 'asc')
                ->where('source', 'syarikat')->where('type',$type)->get();
            $pdf = PDF::loadView('report.g1', compact('certificates', 'siries_number', 'finances'))->setPaper('a4', 'landscape');
            //return $pdf->download('report.pdf');
            return $pdf->stream('G.pdf');
        }
        else {

            $pdf = PDF::loadView('report.xg', compact('siries_number'))->setPaper('a4', 'landscape');
            //return $pdf->download('report.pdf');
            return $pdf->stream('Gx.pdf');

        }




    }

}
