<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('report.index');
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
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }

    public function reportF1(Request $request)
    {
        $batch = $request->input('batch');
        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->orderBy('name', 'asc')
           ->where('type','PB')->get();;
        $pdf = PDF::loadView('report.f1', compact('certificates'))->setPaper('a4', 'landscape');;
        //return $pdf->download('report.pdf');
        return $pdf->stream('F1.pdf');
    }

    public function reportF2()
    {
        $certificates = Certificate::where('flag_printed', 'N')->orderBy('id', 'desc')
            ->where('source', 'syarikat')->where('type','PPT')->get();;
        $pdf = PDF::loadView('report.f1', compact('certificates'));
        //return $pdf->download('report.pdf');
        return $pdf->stream('F2.pdf');
    }

    public function reportF3()
    {
        $certificates = Certificate::where('flag_printed', 'N')->orderBy('id', 'desc')
            ->where('source', 'syarikat')->where('type','SLDN')->get();;
        $pdf = PDF::loadView('report.f1', compact('certificates'));
        //return $pdf->download('report.pdf');
        return $pdf->stream('F3.pdf');
    }

    public function reportF4()
    {
        $certificates = Certificate::where('flag_printed', 'N')->orderBy('id', 'desc')
            ->where('source', 'syarikat')->where('type','NDT')->get();;
        $pdf = PDF::loadView('report.f1', compact('certificates'));
        //return $pdf->download('report.pdf');
        return $pdf->stream('F4.pdf');
    }

    public function reportSearch()
    {
        //
        return view('report.search');
    }
}
