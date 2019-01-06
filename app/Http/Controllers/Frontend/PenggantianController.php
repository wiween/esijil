<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Penggantian;
use App\TypeReplacement;
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
    public function create($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $types = TypeReplacement::all();
        return view('student-replacement.create', compact('certificate', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
