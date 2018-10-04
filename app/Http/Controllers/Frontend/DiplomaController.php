<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Diploma;
use App\Lookup;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $diplomas = Diploma::all();
        return view('diploma.index', compact('diplomas'));
    }

    public function batch()
    {
        //
        $certificates = Certificate::orWhere('level','TAHAP EMPAT')->orWhere('level','TAHAP LIMA')->groupBy('batch_id')->get();
        return view('diploma.batch', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $statuses = Lookup::where('name', 'user_status')->get();
        return view('diploma.create', compact('statuses'));
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
        $diploma = new Diploma();
        $diploma->code_programmed = $request->input('programme_code');
        $diploma->old_name = $request->input('old_name');
        $diploma->new_name = $request->input('new_name');
        $diploma->status = $request->input('status');

        if ($diploma->save()) {
            return redirect('/diploma')->with('successMessage', 'DKM/DLKM telah dicipta');
        } else {
            return back()->with('errorMessage', 'Tidak dapa dicipta. Hubungi Admin');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function show(Diploma $diploma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $diploma = Diploma::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->get();
        return view('diploma.edit', compact('diploma','statuses'));
    }

    public function editBatch($batchid)
    {
        //
        $diplomas = Diploma::all();
        $certificate = Certificate::where('batch_id', $batchid)->first();
        return view('diploma.edit-batch', compact('diplomas', 'certificate'));
    }

    public function updateBatch(Request $request, $batchid)
    {
        //
        $certificates = Certificate::where('batch_id', $batchid)->get();

        foreach($certificates as $certificate) {
            $certificate->programme_name = $request->input('diploma');
            $certificate->save();
        }

        if ($certificate->save()) {
            return redirect('/diploma/batch')->with('successMessage', 'DKM/DLKM telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini. Contact Admin');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $diploma = Diploma::findOrFail($id);
        $diploma->code_programmed = $request->input('code_programmed');
        $diploma->old_name = $request->input('old_name');
        $diploma->new_name = $request->input('new_name');
        $diploma->status = $request->input('status');

        if ($diploma->save()) {
            return redirect('/diploma')->with('successMessage', 'DKM/DLKM telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini. Contact Admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $diploma = Diploma::findOrFail($id);

        if($diploma->delete()) {
            return back()->with('successMessage', 'Program DKM/DLKM telah dihapuskan');
        } else {
            return back()->with('errorMessage', 'Tidak dapat dihapuskan dari pangkalan data');
        }
    }
}
