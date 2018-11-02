<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Lookup;
use App\CertSeq;
use Carbon\Carbon;
use App\Certificate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;

use PDF;
class PrintedController extends Controller
{
    //
    public function index($batch, $type)
    {
        //
        $officer = Auth::user()->email;
        if ($officer == 'super.admin@gmail.com'){

            $certificates = Certificate::where('batch_id', $batch)->where('type', $type)
                ->where('flag_printed', 'N')->orderBy('name', 'asc')->get();
            //$certificates = Certificate::where('officer', $officer)->where('flag_printed', 'N')->orderBy('id', 'desc')->get();
            return view('print.index', compact('certificates'));

        } else {

            $certificates = Certificate::where('batch_id', $batch)->where('officer', $officer)->where('type', $type)
                ->where('flag_printed', 'N')->orderBy('name', 'asc')->get();
            return view('print.index', compact('certificates'));
        }
    }

    public function inbox()
    {
        //
        $officer = Auth::user()->email;

        if ($officer == 'super.admin@gmail.com'){

            $certificates = Certificate::distinct('batch_id')->whereNotNull('officer')
                ->where('flag_printed', 'N')->orderBy('id', 'desc')
                ->groupBy('batch_id')->groupBy('state_id')->get();
            //$certificates = Certificate::where('officer', $officer)->where('flag_printed', 'N')->orderBy('id', 'desc')->get();
            return view('print.inbox', compact('certificates'));

        } else {

            $certificates = Certificate::distinct('batch_id')->where('officer', $officer)
                ->where('flag_printed', 'N')->orderBy('id', 'desc')
                ->groupBy('batch_id')->groupBy('state_id')->get();
           // dd($certificates);
            //$certificates = Certificate::where('officer', $officer)->where('flag_printed', 'N')->orderBy('id', 'desc')->get();
            return view('print.inbox', compact('certificates'));
        }

    }

    public function show($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        return view('print.show', compact('certificate'));
    }

    public function edit($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->get();

        foreach (CertSeq::get() as $seq) {
            Config::set('esijil.cert.' . (($seq->abjad) ? $seq->abjad : 'null'), $seq->run_num);
        }

        $seqs = Config::get('esijil.cert');

        return view('print.edit', compact('certificate', 'statuses', 'seqs'));
    }

    public function update(Request $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $certificate->address = $request->input('address');
//        $certificate->status = $request->input('status');
//        $certificate->flag_printed = $request->input('flag');
        $certificate->flag_printed = 'Y';
        $certificate->current_status = 'telah dicetak';
        $certificate->certificate_number = $request->input('start_siries') . $request->input('siries');
        $certificate->date_print = $request->input('date_print');
        $certificate->remark = $request->input('remark');

       if ($certificate->save()) {
            return redirect('/print/show/'.$id)->with('successMessage', 'Maklumat telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini rekod. Hubungi Admin');
        }
    }

    public function destroy($id)
    {
        //
        $certificate = Certificate::findOrFail($id);

        if($certificate->delete()) {
            return back()->with('successMessage', 'Data telah dihapuskan');
        } else {
            return back()->with('errorMessage', 'Tidak dapat hapuskan data');
        }
    }

    public function setFlag($flag, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $batch_id = $certificate->batch_id;
        $certificate->flag_printed = $flag;
        $certificate->current_status = 'telah dicetak';

        if ($certificate->save()) {
            return redirect('/print/print-list/'. $batch_id)->with('successMessage', 'Maklumat telah disahkan.');
        } else {
            return back()->with('errorMessage', 'Tidak dapat sahkan maklumat. Hubungi Admin.');
        }
    }

    public function reportPdf($batch)
    {
        //$certificates = Certificate::all();
        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')
            ->whereNotNull('certificate_number')->get();

////        tgk jenis certificate
        foreach ($certificates as $certificate) {
            if ($certificate->level == 'PC') {
                $pdf = PDF::loadView('print.certificate', compact('certificates'));
            }

            if ($certificate->level == 'TAHAP EMPAT' || $certificate->level == 'TAHAP LIMA') {
                $pdf = PDF::loadView('print.certificate45', compact('certificates'))->setPaper('a4', 'landscape');
            }

            if ($certificate->level == 'TAHAP SATU' || $certificate->level == 'TAHAP DUA' || $certificate->level == 'TAHAP TIGA') {
                if ($certificate->type == 'ndt') {
                    $pdf = PDF::loadView('print.certificatendt', compact('certificates'));
                } else {
                    $pdf = PDF::loadView('print.certificate13', compact('certificates'));
                }
            }
        }

//        $pdf = PDF::loadView('print.certificate', compact('certificates'));
        //return $pdf->download('report.pdf');
        return $pdf->stream('reports.pdf');
    }

    public function singleReportPdf($id)
    {
        $certificate = Certificate::findOrFail($id);
        $pdf = PDF::loadView('print_certificate.single_certificate', compact('certificate'));
        //return $pdf->download('report.pdf');
        return $pdf->stream('singlereport.pdf');
    }

//    public function collection()
//    {
//        return Certificate::where('flag_printed', 'N')->get();
//    }

    public function listDone()
    {
        //
        $officer = Auth::user()->email;
        if ($officer == 'super.admin@gmail.com'){

            $certificates = Certificate::where('flag_printed', 'Y')->groupBy('batch_id')->orderBy('id', 'desc')->get();
            return view('print.list_done', compact('certificates'));
        } else {
            $certificates = Certificate::where('flag_printed', 'Y')->where('officer', $officer)->groupBy('batch_id')->orderBy('id', 'desc')->get();
            return view('print.list_done', compact('certificates'));
        }

    }

    public function listDetail($batch)
    {
        //
        $officer = Auth::user()->email;
        if ($officer == 'super.admin@gmail.com'){

            $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->orderBy('id', 'desc')->get();
            return view('print.list-detail', compact('certificates'));
        } else {
            $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->where('officer', $officer)->orderBy('id', 'desc')->get();
            return view('print.list-detail', compact('certificates'));
        }

    }

    public function createSiries($batch, $type)
    {
        $total_certificates = Certificate::where('batch_id', $batch)->where('type', $type)
            ->where('flag_printed', 'N')->count();

        foreach (CertSeq::get() as $seq) {
            Config::set('esijil.cert.' . (($seq->abjad) ? $seq->abjad : 'null'), $seq->run_num);
        }

        $seqs = Config::get('esijil.cert');


        return view('print.siries', compact('total_certificates', 'seqs'));
    }

    /**
     * @param Request $request
     * @param $batch
     * @param $type
     */
    public function storeSiries(Request $request, $batch, $type)
    {
        $total_certificates = Certificate::where('batch_id', $batch)->where('type', $type)
            ->where('flag_printed', 'N')->count();

        $no = $request->input('siries');
        $number_siries = substr($no,1);
        $mynumber = (int)$number_siries;
//
//        echo ($number_siries);
//        echo "<br>after tolak" . $mynumber;

        for($i = 1;$i<=$total_certificates;$i++) {


            $new_number = $mynumber++;

//           echo "new number" . $new_number;

            //runing number untuk cetak sijil betulkan untuk 10

            if ($new_number > 0 && $new_number < 10) {
                $new_siries = $request->input('start_siries') . '00000' . $new_number;
            }
                if ($new_number >= 10 && $new_number < 100) {
                    $new_siries = $request->input('start_siries') . '0000' . $new_number;
                }
                    if ($new_number >= 100 && $new_number < 1000) {
                        $new_siries = $request->input('start_siries') . '000' . $new_number;
                    }
                        if ($new_number >= 1000 && $new_number < 10000) {
                            $new_siries = $request->input('start_siries') . '00' . $new_number;
                        }
                            if ($new_number >= 10000 && $new_number < 100000) {
                                $new_siries = $request->input('start_siries') . '0' . $new_number;
                            }
                                if ($new_number >= 100000)  {
                                    $new_siries = $request->input('start_siries') . $new_number;
                                }
            //echo "<br>new siri" . $new_siries;
            $certificates = Certificate::where('batch_id', $batch)->where('type', $type)
                ->where('flag_printed', 'N')->orderBy('name', 'asc')->first();

            //save
            $certificates->flag_printed = 'Y';
            $certificates->certificate_number = $new_siries;
            $certificates->date_print = Carbon::now();
            $certificates->current_status = 'telah dicetak';
            $certificates->qrlink = url('pelajar/' . $certificates->id);
            $certificates->save();

        }

//            if ($batch->save()) {
        return redirect('/print/printed/'. $batch);
//        return redirect('/print/print/'. $batch . '/' . $type)->with('successMessage', 'Maklumat telah disimpan');
//        } else {
//            return back()->with('errorMessag/e', 'Unable to create new activity into database. Contact admin');
//        }
    }

    public function printSingle($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->get();

        foreach (CertSeq::get() as $seq) {
            Config::set('esijil.cert.' . (($seq->abjad) ? $seq->abjad : 'null'), $seq->run_num);
        }

        $seqs = Config::get('esijil.cert');

        return view('print.single', compact('certificate', 'statuses', 'seqs'));
    }

    public function updateSingle(Request $request, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->address = $request->input('address');
//        $certificate->status = $request->input('status');
//        $certificate->flag_printed = $request->input('flag');
        $certificate->flag_printed = 'Y';
        $certificate->current_status = 'telah dicetak';
        $certificate->certificate_number = $request->input('start_siries') . $request->input('siries');
        $certificate->date_print = Carbon::now();
        $certificate->remark = $request->input('remark');

        if ($certificate->save()) {
            return redirect('/print/print/'.$id);
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini rekod. Hubungi Admin');
        }
    }


    public function searchEditPrint()
    {
        //
        return view('print.print-edit');
    }

    public function printResult(Request $request)
    {
        //
        $a = $request->input('ic_number');
        $b = $request->input('batch');
//        echo "a" . $a;
//        echo "b" . $b;
        if ($a <> '') {
            $certificates = Certificate::where('ic_number', 'like', '%' . $a .'%')->
            where('flag_printed', 'N')->where('source', 'dalaman')->get();
            //dd ($certificates);
            return view('print.result-print', compact('certificates'));
        }

        if ($b <> '') {
            $certificates = Certificate::where('batch_id', $b)->
            where('flag_printed', 'N')->groupBy('batch_id')->where('source', 'dalaman')->get();
            //dd ($certificates);
            return view('print.result-batch', compact('certificates'));
        }


    }

    public function printEditResult(Request $request)
    {
        //
        $a = $request->input('ic_number');
        $b = $request->input('batch');
//        echo "a" . $a;
//        echo "b" . $b;
        if ($a <> '') {
            $certificates = Certificate::where('ic_number', 'like', '%' . $a .'%')->
            where('flag_printed', 'Y')->where('source', 'dalaman')->get();
            //dd ($certificates);
            return view('print.edit-result', compact('certificates'));
        }

        if ($b <> '') {
            $certificates = Certificate::where('batch_id', $b)->
            where('flag_printed', 'Y')->groupBy('batch_id')->where('source', 'dalaman')->get();
            //dd ($certificates);
            return view('print.edit-batch', compact('certificates'));
        }


    }

    public function editList($batch)
    {
        //
        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->where('source', 'dalaman')->orderBy('name', 'asc')->get();
        //dd($certificates);
        return view('print.edit-batchlist', compact('certificates'));
    }



}
