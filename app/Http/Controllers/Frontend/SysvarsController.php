<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;

class SysvarsController extends Controller
{
    public function index()
    {
        return view('setting.sysvar.home');
    }
}
