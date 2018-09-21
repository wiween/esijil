<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    //
    public function index($id)
    {
        //
        $status = Post::where('print_certificates_id', $id)->get();
        //return $status;
        return view('status.show', compact('status'));
    }

    public function show(Request $request)
    {
        $certificate = Certificate::where('ic_number',$id)->first();
        $current_status = $certificate->current_status;
//        /cho $current_status;

        if ($current_status == 'dalam proses percetakan' || $current_status == 'telah dicetak') {
            return view('status.result', compact('certificate'));

        } else if ($current_status == 'telah dipos' || $current_status == 'telah diterima') {

            $post = Post::where('certificate_id', $certificate->id)->first();
            return view('status.result', compact('certificate', 'post'));
        }

    }

    public function checkStatus()
    {
        //
        return view('status.check_status', compact('status'));
    }

    public function adminStatus($id)
    {
        //
        $certificate = Certificate::where('ic_number',$id)->first();
        $current_status = $certificate->current_status;
//        /cho $current_status;

        if ($current_status == 'dalam proses percetakan' || $current_status == 'telah dicetak') {
            return view('status.show', compact('certificate'));

        } else if ($current_status == 'telah dipos' || $current_status == 'telah diterima') {

            $post = Post::where('certificate_id', $certificate->id)->first();
            return view('status.show', compact('certificate', 'post'));
        }


        //return $post;
        //dd
//        if ($post === null) {
//            // user doesn't exist
//            $post = Certificate::where('id', $id)->first();
//        }

//        return view('status.show', compact('post'));
    }


}
