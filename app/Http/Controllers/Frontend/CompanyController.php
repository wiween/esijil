<?php

namespace App\Http\Controllers\Frontend;

use DB;
use PDF;
use Input;
use Excel;
use App\Post;
use App\State;
use App\Lookup;
use App\Sysvars;
use App\CertSeq;
use App\Company;
use Carbon\Carbon;
use App\DataExport;
use App\Certificate;
use App\StudentExport;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use App\Repositories\LaporanRepository;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $states = State::all();
        $certificates = Certificate::where('flag_printed', 'N')->count();
        return view('company.download', compact('certificates', 'states'));
//        return view('company.index');
    }

    public function list($batch)
    {
        //
        $certificates = Certificate::where('flag_printed', 'N')
            ->where('batch_id', $batch)->orderBy('name', 'asc')
            ->where('source', 'syarikat')->get();
        //dd($certificates);
        return view('company.list', compact('certificates'));
    }

    public function show($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        return view('company.show', compact('certificate'));
    }

    public function state($type)
    {
        //
        $certificates = Certificate::groupBy('state_id')->where('type', $type)->where('flag_printed', 'N')
            ->where('source', 'syarikat')->get();
        return view('company.state', compact('certificates'));
    }

    public function stateList($id, $type)
    {
        //
        $batches = Certificate::distinct('batch_id')->where('state_id', $id)->where('type', $type)->where('flag_printed', 'N')
            ->where('source', 'syarikat')->groupBy('batch_id')->get();
         //dd($batches);
        $state = State::findOrFail($id);
        return view('company.state_list', compact('batches', 'state'));
    }

    public function updateState(Request $request, $id)
    {
        foreach ($request->input('batch') as $batch) {

            $certificates = Certificate::where('flag_printed', 'N')->where('batch_id', $batch)->where('state_id', $id)->orderBy('name', 'asc')->get();
            // dd($espkm);
            foreach ($certificates as $certificate) {

                $certificate->officer = $request->input('officer');
                $certificate->source = $request->input('source');
                $certificate->save();
            }
//
        }
//            if ($batch->save()) {
        return redirect('/company/type')->with('successMessage', 'Maklumat telah disahkan');
//        } else {
//            return back()->with('errorMessage', 'Unable to create new activity into database. Contact admin');
//        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        //
        $certificate = Certificate::where('id', $id)->first();
        $post = Post::where('certificate_id', $id)->first();
        return view('company.create', compact('certificate', 'post'));
    }

    public function editPost($id)
    {
        //
        $post = Post::where('certificate_id', $id)->first();
        return view('company.repost', compact('post'));
    }

    public function editPostBatch($id)
    {
        //
        $post = Post::where('tracking_number', $id)->firstOrFail();
        return view('company.repost-batch', compact('post'));
    }

    public function updatePost(Request $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);

        if ($request->input('received') == 'N') {
            $certificate->current_status = 'telah dipos';
        } else if ($request->input('received') == 'Y') {
            $certificate->current_status = 'telah diterima';
        } else {
            $certificate->current_status = 'dalam proses percetakan';
        }
        $certificate->save();

        $post = Post::where('certificate_id', $id)->first();
        $post->tracking_number = $request->input('tracking_number');
        $post->date_post = $request->input('date_post');

        $post->flag_received = $request->input('received');
        $post->date_receive = $request->input('date_receive');
        $post->post_company = $request->input('post_company');
        $post->receiver = $request->input('receiver');
        $post->icno_receiver = $request->input('icno_receiver');
        $post->source = 'syarikat';

        $post->remark = $request->input('remark');
        $post->certificate_id = $id;

        if ($post->save()) {
            return redirect('company-search/post')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }

    }

    public function updatePostBatch(Request $request, $id)
    {
        //
//        id adalah trackking number
        $certificates = Certificate::join('posts', 'certificates.id', '=', 'posts.certificate_id')
            ->where('posts.tracking_number', $id)->where('flag_printed', 'Y')->get();
//        dd ($certificates);

        foreach ($certificates as $certificate) {
//            dd($certificate);
//            echo $request->input('received');
//            exit();
            if ($request->input('received') == 'N') {

                $certificate->current_status = 'telah dipos';

            } else if ($request->input('received') == 'Y') {
                $certificate->current_status = 'telah diterima';
            } else {
                $certificate->current_status = 'dalam proses percetakan';
            }

            $certificate->save();

        }

        $posts = Post::where('tracking_number', $id)->get();

        foreach ($posts as $post) {
            $post->tracking_number = $request->input('tracking_number');
            $post->date_post = $request->input('date_post');

            $post->flag_received = $request->input('received');
            $post->post_company = $request->input('post_company');
            $post->date_receive = $request->input('date_receive');
            $post->receiver = $request->input('receiver');
            $post->icno_receiver = $request->input('icno_receiver');
            $post->source = 'syarikat';

            $post->remark = $request->input('remark');
//                $post->certificate_id = $certificate->id;
            $post->save();
        }

        if ($post->save()) {
            return redirect('/company-search/list')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);

        if ($request->input('received') == 'N') {
            $certificate->current_status = 'telah dipos';
        } else if ($request->input('received') == 'Y') {
            $certificate->current_status = 'telah diterima';
        } else {
            $certificate->current_status = 'dalam proses percetakan';
        }
        $certificate->save();

        $post = new Post();
        $post->tracking_number = $request->input('tracking_number');
        $post->date_post = $request->input('date_post');

        $post->flag_received = $request->input('received');
        $post->date_receive = $request->input('date_receive');
        $post->post_company = $request->input('post_company');
        $post->receiver = $request->input('receiver');
        $post->icno_receiver = $request->input('icno_receiver');
        $post->source = 'syarikat';

        $post->remark = $request->input('remark');
        $post->certificate_id = $id;

        if ($post->save()) {
            return redirect('company-search/post')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function createBatch()
    {
        //
//        $certificate = Certificate::where('batch_id', $batch)->first();
        return view('company.create_postbatch');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBatch(Request $request, $batch)
    {
        //
        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->get();

        foreach ($certificates as $certificate) {

            if ($request->input('received') == 'N') {
                $certificate->current_status = 'telah dipos';
            } else if ($request->input('received') == 'Y') {
                $certificate->current_status = 'telah diterima';
            } else {
                $certificate->current_status = 'dalam proses percetakan';
            }

            $certificate->save();


            $post = new Post();
            $post->tracking_number = $request->input('tracking_number');
            $post->date_post = $request->input('date_post');

            $post->flag_received = $request->input('received');
            $post->post_company = $request->input('post_company');
            $post->date_receive = $request->input('date_receive');
            $post->receiver = $request->input('receiver');
            $post->icno_receiver = $request->input('icno_receiver');
            $post->source = 'syarikat';

            $post->remark = $request->input('remark');
            $post->certificate_id = $certificate->id;
            $post->save();
        }


        if ($post->save()) {
            return redirect('company-search/post')->with('successMessage', 'Maklumat Pos Telah Dijana');
        } else {
            return back()->with('errorMessage', 'Tidak boleh jana maklumat pos. Sila hubungi Admin');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
//        $post = Post::where('certificate_id', $id)->first();
        $statuses = Lookup::where('name', 'user_status')->get();

        foreach (CertSeq::get() as $seq) {
            Config::set('esijil.cert.' . (($seq->abjad) ? $seq->abjad : 'null'), $seq->run_num);
        }

        $seqs = Config::get('esijil.cert');

        return view('company.edit', compact('certificate', 'statuses', 'seqs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);
//        $certificate->address = $request->input('address');
//        $certificate->status = $request->input('status');
//        $certificate->flag_printed = $request->input('flag');
        $certificate->flag_printed = 'Y';
        $certificate->current_status = 'telah dicetak';
        $certificate->certificate_number = $request->input('start_siries') . $request->input('siries');
//        $certificate->date_print = $request->input('date_print');
        $certificate->remark = $request->input('remark');

        if ($certificate->save()) {
            return redirect('/company-print/search-edit')->with('successMessage', 'Maklumat telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini rekod. Hubungi Admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //
    }

    public function export($batch) //batch tu je
    {
//        $export = Certificate::where('flag_printed', 'N')
//            ->where('batch_id', $batch)->orderBy('id', 'desc')
//            ->where('source', 'syarikat')->get();
        //dd($export);
        return (new DataExport())->currentBatch($batch)->download('student' . $batch . '.xlsx');
    }

    public function exportSingle($id) // single tu je
    {
//        $export = Certificate::where('flag_printed', 'N')
//            ->where('batch_id', $batch)->orderBy('id', 'desc')
//            ->where('source', 'syarikat')->get();
        //dd($export);
        return (new StudentExport())->currentId($id)->download('student' . $id . '.xlsx');
    }

    public function exportAll($id) //semua batch dia tick - hold dulu 9/7
    {
        return new DataExport();
    }


    public function search()
    {
        //
        return view('company.search');
    }

    public function searchResult(Request $request)
    {
        //
        $a = $request->input('ic_number');
        $b = $request->input('batch');
        //dd ($a);
        if ($a <> '') {

            $post = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.source', 'syarikat')->where('certificates.ic_number', 'like', '%' . $a . '%')->count();

            if ($post <= 0) {
                $certificates = Certificate::where('ic_number', 'like', '%' . $a . '%')->where('flag_printed', 'Y')->where('source', 'syarikat')->get();
                //dd ($certificates);

                return view('company.result', compact('certificates'));
            }

            if ($b <> '') {
                $post = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.batch_id', $b)->where('certificates.source', 'syarikat')->count();

                if ($post <= 0) {
                    $certificates = Certificate::select('batch_id', 'type', DB::raw("count(id) as jumlahstudent"))->where('batch_id', $b)->where('flag_printed', 'Y')->groupBy('batch_id')->where('source', 'syarikat')->get();
                //dd ($certificates);
                    return view('company.result_post', compact('certificates'));
                } else {
                    $certificates = "tiada";
                    return view('company.result_post', compact('certificates'));
                }
            }
        }
    }

    public function searchList($batch, $type)
    {
        //
        $certificates = Certificate::where('flag_printed', 'Y')
            ->where('batch_id', $batch)->where('type', $type)->orderBy('name', 'asc')->get();
        //dd($certificates);
        return view('company.search-list', compact('certificates'));
    }

    public function searchPrint()
    {
        //
        return view('company.search_print');
    }

    public function searchEditPrint()
    {
        //
        return view('company.edit-print');
    }

    public function printResult(Request $request)
    {
        //
        $a = $request->input('ic_number');
        $b = $request->input('batch');
//        echo "a" . $a;
//        echo "b" . $b;
        if ($a <> '') {
            $certificates = Certificate::where('ic_number', 'like', '%' . $a . '%')->where('flag_printed', 'N')->where('source', 'syarikat')->get();
            //dd ($certificates);
            return view('company.result_print', compact('certificates'));
        }

        if ($b <> '') {
            $certificates = Certificate::where('batch_id', $b)->where('flag_printed', 'N')->groupBy('batch_id')->where('source', 'syarikat')->get();
            //dd ($certificates);
            return view('company.result_batch', compact('certificates'));
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
            $certificates = Certificate::where('ic_number', 'like', '%' . $a . '%')->where('flag_printed', 'Y')->where('source', 'syarikat')->get();
            //dd ($certificates);
            return view('company.edit-result', compact('certificates'));
        }

        if ($b <> '') {
            $certificates = Certificate::where('batch_id', $b)->where('flag_printed', 'Y')->groupBy('batch_id')->where('source', 'syarikat')->get();
            //dd ($certificates);
            return view('company.edit-batch', compact('certificates'));
        }


    }

    public function editList($batch)
    {
        //
        $certificates = Certificate::where('batch_id', $batch)->where('flag_printed', 'Y')->where('source', 'syarikat')->orderBy('name', 'asc')->get();
        //dd($certificates);
        return view('company.edit-batchlist', compact('certificates'));
    }

    public function setFlag($flag, $id)
    {
//        echo $id;
        $certificate = Certificate::findOrFail($id);
//        dd($certificate);
        $certificate->flag_printed = $flag;
        $certificate->current_status = 'telah dicetak';
        $certificate->date_print = Carbon::now();

        if ($certificate->save()) {
            return redirect('/company-search/post')->with('successMessage', 'Maklumat telah disahkan.');
        } else {
            return back()->with('errorMessage', 'Tidak dapat sahkan maklumat. Hubungi Admin.');
        }
    }

    public function createSiries($batch, $type)
    {
        //
        $total_certificates = Certificate::where('batch_id', $batch)->where('type', $type)
            ->where('flag_printed', 'N')->where('source', 'syarikat')->count();
        $a = Certificate::where('batch_id', $batch)->where('type', $type)->where('flag_printed', 'Y')->where('source', 'syarikat')->orderBy('certificate_number', 'desc')->first();
        $b = Certificate::where('batch_id', $batch)->where('type', $type)->where('flag_printed', 'Y')->where('source', 'syarikat')->orderBy('certificate_number', 'desc')->first();

        $seqs = Sysvars::where('code', 'like', 'SYARIKAT%')->get();

        return view('company.siries', compact('total_certificates', 'a', 'b', 'seqs'));
    }

    /**
     * @param Request $request
     * @param $batch
     * @param $type
     */
    public function storeSiries(Request $request, $batch, $type)
    {
        $request->validate([
            'date_print' => 'required',
            'start_siries' => 'required|min:1',
            'siries' => 'required'
        ]);

        $certificates = Certificate::where('batch_id', $batch)->where('type', $type)
            ->where('flag_printed', 'N')->where('source', 'syarikat')->orderBy('name', 'asc')->get();

        $siries = (int)$request->input('siries');

        $sysSiri = Sysvars::where('code', 'SYARIKAT_' . $request->input('start_siries'))->first();

        foreach ($certificates as $certificate) {
            DB::transaction(function () use ($certificate, $sysSiri, $request, $siries) {
                if ($request->input('start_siries') == 'NULL') {
                    $certificate->certificate_number = str_pad((string)$siries, 6, "0", STR_PAD_LEFT);
                } else {
                    $certificate->certificate_number = $request->input('start_siries') . str_pad((string)$siries, 6, "0", STR_PAD_LEFT);
                }

                $certificate->flag_printed = 'Y';
                $certificate->date_print = $request->input('date_print');
                $certificate->current_status = 'telah dicetak';
                $certificate->qrlink = url('pelajar/' . $certificate->id);
                $certificate->save();

                if ($siries > $sysSiri->value) {
                    $sysSiri->value = $siries;
                    $sysSiri->save();
                }
            });

            $siries++;
        }

//            if ($batch->save()) {
//        return redirect('/print/printed/'. $batch);
        return redirect('/company-download/state/' . $type)->with('successMessage', 'Maklumat telah disimpan');
//        } else {
//            return back()->with('errorMessag/e', 'Unable to create new activity into database. Contact admin');
//        }
    }

    public function reportChoice()
    {
        return view('company.report-choice');
    }

    public function reportList($type)
    {
        $batches = Certificate::select('certificates.batch_id', 'certificates.type', DB::raw("count(certificates.id) as jumlahstudent"))
            ->join('posts', 'certificates.id', '=', 'posts.certificate_id')
            ->where('certificates.flag_printed', 'Y')
            ->where('certificates.source', 'syarikat')->where('certificates.type', $type)->groupBy('certificates.batch_id')->get();
        $statuses = Lookup::where('name', 'user_status')->get();

        return view('company.report_list', compact('batches', 'statuses'));
    }

    public function showFReport($batch, $type, LaporanRepository $laporanRepository)
    {
        $certificates = $laporanRepository->laporanFData($batch, $type);
        $siries_number = $laporanRepository->siriesNumber($batch, $type);
        $first = $certificates->first();

        if ($certificates->isEmpty()) {
            return view('errors.exists');
        }

        $pdf = PDF::loadView('report.f', compact('certificates', 'siries_number', 'first'))->setPaper('a4', 'landscape');
        //return $pdf->download('report.pdf');
        return $pdf->stream('F.pdf');
    }

    public function showGReport($batch, $type, LaporanRepository $laporanRepository)
    {
        $certificates = $laporanRepository->laporanGData($batch, $type);
        $siries_number = $laporanRepository->siriesNumber($batch, $type);
        $rate = $laporanRepository->rateTuntut();


        if (!$certificates) {
            return view('errors.exists');
        }

        $pdf = PDF::loadView('report.g1', compact('certificates', 'siries_number', 'rate'))->setPaper('a4', 'landscape');
        //return $pdf->download('report.pdf');
        return $pdf->stream('G.pdf');
    }

    public function showGMultiReport(Request $request, LaporanRepository $laporanRepository)
    {
        $certificates = $laporanRepository->laporanMultiGData($request);
        $rate = $laporanRepository->rateTuntut();

        $pdf = PDF::loadView('report.g2', compact('certificates', 'rate'))->setPaper('a4', 'landscape');
        //return $pdf->download('report.pdf');
        return $pdf->stream('G.pdf');
    }

    public function companyPost()
    {
        //
        $posts = Post::where('source', 'syarikat')->orderBy('id', 'desc')->get();
        return view('company.post-batch', compact('posts'));
    }

    public function detailStudentPost($batch)
    {
        //
//        $posts = Post::where('source', 'syarikat')->orderBy('id', 'desc')->get();
        $posts = Post::join('certificates', 'posts.certificate_id', '=', 'certificates.id')->where('certificates.source', 'syarikat')->where('batch_id', $batch)->get();
        return view('company.post-batchdetail', compact('posts'));
    }

    public function editCertificate($batch, $type)
    {

        $total_certificates = Certificate::where('batch_id', $batch)->where('type', $type)
            ->where('flag_printed', 'Y')->where('source', 'syarikat')->whereNotNull('certificate_number')->count();
        $certificate = Certificate::where('batch_id', $batch)->where('type', $type)
            ->where('flag_printed', 'Y')->where('source', 'syarikat')->whereNotNull('certificate_number')->first();
        $a = Certificate::where('batch_id', $batch)->where('type', $type)->where('flag_printed', 'Y')->where('source', 'syarikat')->orderBy('certificate_number', 'desc')->first();
        $b = Certificate::where('batch_id', $batch)->where('type', $type)->where('flag_printed', 'Y')->where('source', 'syarikat')->orderBy('certificate_number', 'desc')->first();

        foreach (CertSeq::get() as $seq) {
            Config::set('esijil.cert.' . (($seq->abjad) ? $seq->abjad : 'null'), $seq->run_num);
        }

        $seqs = Sysvars::where('code', 'like', 'SYARIKAT%')->get();

        return view('company.edit-certificatebatch', compact('total_certificates', 'a', 'b', 'seqs', 'certificate'));

    }

    public function updateCertificate($batch, $type, Request $request)
    {
        $request->validate([
            'date_print' => 'required',
            'start_siries' => 'required|min:1',
            'siries' => 'required'
        ]);

        $certificates = Certificate::where('batch_id', $batch)->where('type', $type)
            ->where('flag_printed', 'Y')->where('source', 'syarikat')->whereNotNull('certificate_number')->orderBy('name', 'asc')->get();

        $siries = (int)$request->input('siries');

        $sysSiri = Sysvars::where('code', 'SYARIKAT_' . $request->input('start_siries'))->first();

        foreach ($certificates as $certificate) {
            DB::transaction(function () use ($certificate, $sysSiri, $request, $siries) {
                if ($request->input('start_siries') == 'NULL') {
                    $certificate->certificate_number = str_pad((string)$siries, 6, "0", STR_PAD_LEFT);
                } else {
                    $certificate->certificate_number = $request->input('start_siries') . str_pad((string)$siries, 6, "0", STR_PAD_LEFT);
                }

                $certificate->date_print = $request->input('date_print');
                $certificate->save();

                $sysSiri->value = $siries;
                $sysSiri->save();
            });

            $siries++;
        }

//            if ($batch->save()) {
//        return redirect('/print/printed/'. $batch);
        return redirect('/company-print/edit-batchlist/' . $batch)->with('successMessage', 'Maklumat telah disimpan');

    }


}
