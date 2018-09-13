<?php

namespace App\Http\Controllers\Api;

use App\Certificate;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class PelajarController extends Controller
{
    public function show($id)
    {
        $exist = Certificate::where('id', $id)->where('flag_printed', 'Y')->count();

        if ($exist > 0) {
            $status = 'wujud';
            $certificate = Certificate::where('id', $id)->where('flag_printed', 'Y')->first();
            $nama = $certificate->name;
            $ic = $certificate->ic_number;
            $level = $certificate->level;

            //return view('api.qrcode', compact('certificate'));

        } else {
            $status = 'tiada';
            $nama ='';
            $ic = '';
            $level = '';
        }

        // once everything done already
        $data = [
            "status" => $status,
            "namaPelajar"=> $nama,
            "icPelajar"=> $ic,
            "levelPelajar"=> $level,

            "saveAt" => Carbon::now()
        ];

        return response()->json($data, 200);


    }

    public function view($id)
    {
        $certificate = Certificate::where('id', $id)->where('flag_printed', 'Y')->first();
//        dd($certificate);
        return view('pelajar.show', compact('certificate'));
    }

}


