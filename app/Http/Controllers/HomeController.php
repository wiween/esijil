<?php

namespace App\Http\Controllers;

use App\Certificate;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role = Auth::user()->role;

        if ($role == 'company') {
            return redirect('/company-download');
        } else if ($role == 'akauntan') {
            return redirect('/finance/confirm');
        } else {
            $officer = Auth::user()->email;

            if ($officer == 'super.admin@gmail.com') {

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
    }
}

