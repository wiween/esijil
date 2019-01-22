<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Lookup;
use App\Post;
use App\Replacement;
use App\Source;
use App\State;
use App\User;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Nullable;

class CertificateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($batch, $type)
    {
        //
        $certificates = Certificate::where('flag_printed', 'N')->where('batch_id', $batch)
            ->where('type', $type)->whereNull('source')->orderBy('id', 'desc')->get();
        //dd($certificates);
        return view('print_certificate.index', compact('certificates'));
    }

    public function listDone()
    {
        //
        $certificates = Certificate::where('flag_printed', 'Y')->orderBy('id', 'desc')->get();
        return view('print_certificate.list_done', compact('certificates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function type()
    {
        //
        $states = State::all();
        return view('print_certificate.type', compact('states'));
    }

    public function state($type)
    {
        //salah kalau ade state yag sama
        $certificates = Certificate::groupBy('state_id')->where('type', $type)
            ->whereNull('source')->where('flag_printed', 'N')->get();
        return view('print_certificate.state', compact('certificates'));
    }

    public function stateList($id, $type)
    {
        //
        $batches = Certificate::distinct('batch_id')->whereNull('source')->where('state_id', $id)
            ->where('type', $type)->where('flag_printed', 'N')
            ->groupBy('batch_id')->get();
//        $batches = Batch::where('state_id', $id)->get();
        $users = User::where('role', 'pencetak')->where('user_type', $type)->get();
        $sources = Source::all();
        $state = State::findOrFail($id);
        //dd($batches);
        return view('print_certificate.state_list', compact('batches', 'users', 'sources', 'state'));
    }

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
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        return view('print_certificate.show', compact('certificate'));
    }

    public function job($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $users = User::where('role', 'pencetak')->where('user_type', Auth::user()->user_type)->get();
        $sources = Source::all();
        return view('print_certificate.job', compact('certificate', 'users', 'sources'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->get();
        return view('print_certificate.edit', compact('certificate', 'statuses'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $certificate->address = $request->input('address');
        $certificate->status = $request->input('status');
        $certificate->flag_printed = $request->input('flag');
        $certificate->remark = $request->input('remark');
        $certificate->qrlink = url('pelajar/' . $id);

        if ($certificate->save()) {
            return redirect('/certificate/show/' . $id)->with('successMessage', 'Maklumat telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini rekod. Hubungi Admin');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificate  $Certificate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $certificate = Certificate::findOrFail($id);

        if ($certificate->delete()) {
            return back()->with('successMessage', 'Data telah dihapuskan');
        } else {
            return back()->with('errorMessage', 'Tidak dapat hapuskan data');
        }
    }

    public function setFlag($flag, $id)
    {
        $certificate = Certificate::findOrFail($id);
        $certificate->flag_printed = $flag;

        if ($certificate->save()) {
            return redirect('/certificate')->with('successMessage', 'Maklumat telah disahkan.');
        } else {
            return back()->with('errorMessage', 'Tidak dapat sahkan maklumat. Hubungi Admin.');
        }
    }

    public function updateState(Request $request, $id, $type)
    {
        foreach ($request->input('batch') as $batch) {

            $certificates = Certificate::where('flag_printed', 'N')->where('batch_id', $batch)->where('state_id', $id)->where('type', $type)->get();

            foreach ($certificates as $certificate) {
                $certificate->officer = $request->input('officer');
                $certificate->source = $request->input('source');
                $certificate->session = $request->input('session');
                $certificate->qrlink = url('pelajar/' . $certificate->id);
                $certificate->save();
            }
        }
//            if ($batch->save()) {
        return redirect('/certificate/statelist/' . $id . "/" . $type)->with('successMessage', 'Maklumat telah disahkan');
//        } else {
//            return back()->with('errorMessage', 'Unable to create new activity into database. Contact admin');
//        }
    }

    public function jobRotation(Request $request, $id)
    {
        //
        $certificate = Certificate::findOrFail($id);
        $batch_id = $certificate->batch_id;
        $certificate->officer = $request->input('officer');
        $certificate->source = $request->input('source');
        $certificate->session = $request->input('session');

        if ($certificate->save()) {
            return redirect('/certificate/job/' . $id)->with('successMessage', 'Maklumat telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini rekod. Hubungi Admin');
        }
    }

    public function jobDone($batch)
    {
        //
        $certificates = Certificate::where('batch_id', $batch)->whereNotNull('source')->where('flag_printed', 'N')->orderBy('id', 'desc')->get();
        return view('print_certificate.job_done', compact('certificates'));
    }

    public function doneBatch()
    {
        //
        $user_type = Auth::user()->user_type;
        $certificates = Certificate::distinct('batch_id')->whereNotNull('source')->where('flag_printed', 'N')->where('type', $user_type)
            ->groupBy('batch_id')->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('print_certificate.done_batch', compact('certificates'));
    }

    public function typeRedistribute()
    {
        //
        return view('print_certificate.type-redistribute', compact('states'));
    }

    public function redistribute($type)
    {
        //
        $replacements = Replacement::join('certificates', 'certificates.id', '=', 'replacements.certificate_id')
            ->select('replacements.*', 'certificates.name', 'certificates.ic_number', 'certificates.batch_id')
            ->where('replacements.flag_certificate', 'N')
            ->where('certificates.type', $type)
            ->where('replacements.flag_lulus', 'Y')
            ->get();
        //dd($batches);
        return view('print_certificate.state-redistribute', compact('replacements'));
    }

    public function doneRedistribute()
    {
        //
        $user_type = Auth::user()->user_type;
        $certificates = Certificate::distinct('batch_id')->whereNotNull('source')->where('flag_printed', 'N')->where('type', $user_type)
            ->groupBy('batch_id')->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('print_certificate.done_batch', compact('certificates'));
    }

    public function redistributeSource($id)
    {
        $replacement = Replacement::findOrFail($id);
        $users = User::where('role', 'pencetak')->get();
        $sources = Source::all();
        return view('print_certificate.redistribute', compact('replacement', 'users', 'sources'));
    }


    public function redistributeupdateSource(Request $request, $id)
    {
        $replacement = Replacement::findOrFail($id);
        $student = $replacement->certificate_id;
        $bil_cetakan = $replacement->printed_remark;

        //kemasini
        $certificate = Certificate::findOrFail($student);
        $date_printed_old = $certificate->date_printed;
        $current_status_old = $certificate->current_status;
        $printed_old = $certificate->printed_remark;

        $certificate->officer = $request->input('officer');
        $certificate->source = $request->input('source');
        $certificate->session = $request->input('session');
        $certificate->printed_remark = $bil_cetakan;
        $certificate->flag_printed = 'N';
        $certificate->certificate_number = null;
        $certificate->current_status = 'dalam proses cetakan';
        $certificate->save();

       //set post id kat replacement
        $post = Post::where('certificate_id', $student)->first();
        //dd($post);
        $post_id = $post->id;

       //set flag Y
        $replacement->flag_certificate = 'Y';
        $replacement->date_printed_old = $date_printed_old;
        $replacement->status_old = $current_status_old;
        $replacement->printed_remark = $printed_old;
        $replacement->post_id = $post_id;
        $replacement->save();

        //delete post lama
        $post->delete();

        return view('print_certificate.type-redistribute');
    }



}
