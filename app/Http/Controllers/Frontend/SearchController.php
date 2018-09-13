<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    //
    public function search()
    {
        //
        return view('search.index');
    }

    public function searchResult(Request $request)
    {
        //
        $a = $request->input('ic_number');
        $b = $request->input('batch');
        //dd ($a);
        if ($a <> '') {
            $certificates = Certificate::where('ic_number', 'like', '%' . $a .'%')->get();
        }

        if ($b <> '') {
            $certificates = Certificate::where('batch_id', $b)->get();
        }

        //dd ($certificates);
        return view('search.result', compact('certificates'));
    }

}
