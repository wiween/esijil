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
        $certificates = Certificate::where('level','TAHAP EMPAT')->get();
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
    public function edit(Request $request, $id)
    {
        //
        $diploma = Diploma::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->get();
        return view('diploma.edit', compact('diploma','statuses'));
    }

    public function editBatch(Request $request, $id)
    {
        //
        $diplomas = Diploma::all();
       // $statuses = Lookup::where('name', 'user_status')->get();
        return view('diploma.edit-batch', compact('diplomas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diploma $diploma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Diploma  $diploma
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diploma $diploma)
    {
        //
    }
}
