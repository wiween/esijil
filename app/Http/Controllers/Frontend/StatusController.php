<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Post;
use App\Replacement;
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
        //
        $category = $request->input('category');
        $ic_number = $request->input('ic_number');
        $batch = $request->input('batch');
        //echo $ic_number;
        if ($category == 'baru') {

            if ($ic_number <> '' && $batch <> '') {
                $exist = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.ic_number', $ic_number)->where('certificates.batch_id', $batch)->count();
                if ($exist <= 0) {
                    return view('status.noresult');
                } else {
                    $certificates = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.ic_number', $ic_number)->where('certificates.batch_id', $batch)->get();
//                dd($certificate);
                    return view('status.result', compact('certificates'));
                }
            } else if ($ic_number <> '' && $batch == '') {
                $exist = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.ic_number', $ic_number)->count();
                if ($exist <= 0) {
                    return view('status.noresult');
                } else {
                    $certificates = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.ic_number', $ic_number)->get();
//                dd($certificates);
                    return view('status.result-ic', compact('certificates'));
                }
            } else if ($ic_number == '' && $batch <> '') {

                //exist
                $exist = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.batch_id', $batch)->count();

                if ($exist <= 0) {
                    return view('status.noresult');
                } else {
                    $certificates = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.batch_id', $batch)->get();
                    return view('status.result-batch', compact('certificates'));
                }

            } else {
                return view('status.noresult');
            }

           //dd($certificate);
//sijil Gantian join dengan repalcement
        } else if ($category == 'gantian') {
            if ($ic_number <> '' && $batch <> '') {
                $certificates = Certificate::join('replacement', 'certificates.id', '=', 'replacements.certificate_id')->where('ic_number', $ic_number)->where('batch_id', $batch)->get();
                return view('status.result', compact('certificates'));
            } else if ($ic_number <> '' && $batch == '') {
                $certificates = Certificate::join('replacement', 'certificates.id', '=', 'replacements.certificate_id')->where('ic_number', $ic_number)->get();
                return view('status.result', compact('certificates'));
            } else if ($ic_number == '' && $batch <> '') {
                $certificates = Certificate::join('replacement', 'certificates.id', '=', 'replacements.certificate_id')->where('batch_id', $batch)->get();
                return view('status.result', compact('certificates'));
            } else {
                return view('status.noresult');
            }

        } else {
            return view('status.noresult');
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
        $exist = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.ic_number', $id)->count();
        if ($exist <= 0) {
            return view('status.noresult');
        } else {
            $certificates = Certificate::leftjoin('posts', 'certificates.id', '=', 'posts.certificate_id')->where('certificates.ic_number', $id)->get();

//        $certificate = Certificate::where('ic_number',$id)->first();
//        $current_status = $certificate->current_status;
////        /cho $current_status;
//
//        if ($current_status == 'dalam proses percetakan' || $current_status == 'telah dicetak') {
            return view('status.show', compact('certificates'));
        }
//        } else if ($current_status == 'telah dipos' || $current_status == 'telah diterima') {
//
//            $post = Post::where('certificate_id', $certificate->id)->first();
//            return view('status.show', compact('certificate', 'post'));
//        }


        //return $post;
        //dd
//        if ($post === null) {
//            // user doesn't exist
//            $post = Certificate::where('id', $id)->first();
//        }

//        return view('status.show', compact('post'));
    }

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
