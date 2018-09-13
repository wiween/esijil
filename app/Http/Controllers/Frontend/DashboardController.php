<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Dashboard;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $officer = Auth::user()->email;
        if ($officer == 'super.admin@gmail.com'){

            $certificates = Certificate::distinct('batch_id')->whereNotNull('officer')
                ->where('flag_printed', 'N')->orderBy('id', 'desc')
                ->groupBy('batch_id')->groupBy('state_id')->get();
            //$certificates = Certificate::where('officer', $officer)->where('flag_printed', 'N')->orderBy('id', 'desc')->get();
            return view('dashboard.home', compact('certificates'));

        } else {

            $certificates = Certificate::distinct('batch_id')->where('officer', $officer)
                ->where('flag_printed', 'N')->orderBy('id', 'desc')
                ->groupBy('batch_id')->groupBy('state_id')->get();
            //$certificates = Certificate::where('officer', $officer)->where('flag_printed', 'N')->orderBy('id', 'desc')->get();
            return view('dashboard.home', compact('certificates'));
        }

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
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Dashboard $dashboard)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }


}
