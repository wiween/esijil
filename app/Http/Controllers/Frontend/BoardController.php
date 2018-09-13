<?php

namespace App\Http\Controllers\Frontend;

use App\Certificate;
use App\Espkm;
use App\Lookup;
use App\State;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BoardController extends Controller
{
    //
    public function index()
    {
        //
//       $espkms = Espkm::where('flag_boarded', 'N')->orderBy('id', 'desc')->get();
        //dd($certificates);
        $states = State::all();
        return view('board.index', compact('states'));
    }

    public function data()
    {
        return view('data.index');
    }

    public function state($type)
    {
        //
        $espkms = Espkm::groupBy('state_id')->where('type', $type)->where('flag_boarded', 'N')->get();
        return view('board.state', compact('espkms'));
    }


    public function stateList($id)
    {
        //
//        $batches = Batch::where('state_id', $id)->whereNull('source')->whereNull('officer')->get();
//        $certificates = Certificate::where('batch_number', $batch->batch_number)->where('flag_printed', 'N')->count();
        $batches = Espkm::distinct('batch_id')->where('state_id', $id)->where('flag_boarded', 'N')->groupBy('batch_id')->get();
//        $batches = Batch::where('state_id', $id)->get();
        //kat sini filter
        $state = State::findOrFail($id);
        //dd($batches);
        return view('board.state_list', compact('batches', 'state'));
    }


    public function updateState(Request $request, $id)
    {
        foreach ($request->input('batch') as $batch) {

            $espkms = Espkm::where('flag_boarded', 'N')->where('batch_id', $batch)->where('state_id', $id)->get();
            // dd($espkm);
            foreach ($espkms as $espkm) {

                $espkm->flag_boarded = $request->input('board_confirm');
                $espkm->save();

                //insert dalam certificate
                $certificate = new Certificate();

                $certificate->name = $espkm->name;
                $certificate->ic_number = $espkm->ic_number;
                $certificate->training_group_number = $espkm->training_group_number;
                $certificate->programme_name = $espkm->programme_name;
                $certificate->programme_code = $espkm->programme_code;
                $certificate->level = $espkm->level;
                $certificate->level = $espkm->level;
                $certificate->type = $espkm->type;
                $certificate->result_ppl = $espkm->result_ppl;
                $certificate->batch_id = $espkm->batch_id;
                $certificate->address = $espkm->address;
                $certificate->state_id = $espkm->state_id;
                $certificate->updated_by = Auth::user()->email;
                $certificate->save();
            }
//
        }
//            if ($batch->save()) {
        return redirect('/board/type')->with('successMessage', 'Maklumat telah disahkan');
//        } else {
//            return back()->with('errorMessage', 'Unable to create new activity into database. Contact admin');
//        }
    }


    public function list($batch)
    {
        //
        $espkms = Espkm::where('flag_boarded', 'N')
            ->where('batch_id', $batch)->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('board.list', compact('espkms'));
    }

    public function listBatch()
    {
        //
        $espkms = Espkm::distinct('batch_id')->where('flag_boarded', 'Y')
            ->where('type', 'pb')->groupBy('batch_id')->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('board.list_batch', compact('espkms'));
    }

    public function listKiv()
    {
        //
        $espkms = Espkm::distinct('batch_id')->where('flag_boarded', 'K')
            ->where('type', 'pb')->groupBy('batch_id')->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('board.list_kiv', compact('espkms'));
    }

    public function listTolak()
    {
        //
        $espkms = Espkm::distinct('batch_id')->where('flag_boarded', 'R')
            ->where('type', 'pb')->groupBy('batch_id')->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('board.list_tolak', compact('espkms'));
    }

    public function detailDone($batch)
    {
        //
        $espkms = Espkm::where('flag_boarded', 'Y')->where('type', 'pb')
            ->where('batch_id', $batch)->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('board.list_done', compact('espkms'));
    }

    public function detailReject($batch)
    {
        //
        $espkms = Espkm::where('flag_boarded', 'R')->where('type', 'pb')
            ->where('batch_id', $batch)->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('board.detail_tolak', compact('espkms'));
    }

    public function detailKiv($batch)
    {
        //
        $espkms = Espkm::where('flag_boarded', 'K')->where('type', 'pb')
            ->where('batch_id', $batch)->orderBy('id', 'desc')->get();
        //dd($certificates);
//        $batch = Batch::findOrFail($batch);
        return view('board.detail_kiv', compact('espkms'));
    }

    public function show($id)
    {
        //
        $espkm = Espkm::findOrFail($id);
        return view('board.show', compact('espkm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificate $Certificate
     * @return \Illuminate\Http\Response
     */

    public function setFlag($flag, $id)
    {
        $espkm = Espkm::findOrFail($id);
        $espkm->flag_boarded = $flag;
        $espkm->save();

        //masukkan maklumat dalam certificate
        $certificate = new Certificate();

        $certificate->name = $espkm->name;
        $certificate->ic_number = $espkm->ic_number;
        $certificate->training_group_number = $espkm->training_group_number;
        $certificate->programme_name = $espkm->programme_name;
        $certificate->programme_code = $espkm->programme_code;
        $certificate->level = $espkm->level;
        $certificate->type = $espkm->type;
        $certificate->pb_name = $espkm->pb_name;
        $certificate->result_ppl = $espkm->result_ppl;
        $certificate->batch_id = $espkm->batch_id;
        $certificate->address = $espkm->address;
        $certificate->state_id = $espkm->state_id;
        $certificate->updated_by = Auth::user()->email;

        if ($certificate->save()) {
            return redirect('/board/list/' . $espkm->batch_id)->with('successMessage', 'Maklumat telah disahkan.');
        } else {
            return back()->with('errorMessage', 'Tidak dapat sahkan. Hubungi Admin');
        }
    }

    public function edit($id)
    {
        //
        $espkm = Espkm::findOrFail($id);
        $statuses = Lookup::where('name', 'user_status')->get();
        return view('board.edit', compact('espkm', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        //
        $espkm = Espkm::findOrFail($id);

        //insert dalam certificate
        $certificate = new Certificate();
        $certificate->name = $espkm->name;
        $certificate->ic_number = $espkm->ic_number;
        $certificate->training_group_number = $espkm->training_group_number;
        $certificate->programme_name = $espkm->programme_name;
        $certificate->programme_code = $espkm->programme_code;
        $certificate->level = $espkm->level;
        $certificate->level = $espkm->level;
        $certificate->type = $espkm->type;
        $certificate->result_ppl = $espkm->result_ppl;
        $certificate->batch_id = $espkm->batch_id;
        $certificate->address = $espkm->address;
        $certificate->state_id = $espkm->state_id;
        $certificate->updated_by = Auth::user()->email;
        $certificate->save();

        $espkm->flag_boarded = $request->input('board_confirm');
        $espkm->reason = $request->input('reason');

        if ($espkm->save()) {
            return redirect('/board/show/' . $id)->with('successMessage', 'Maklumat telah dikemaskini');
        } else {
            return back()->with('errorMessage', 'Tidak dapat kemaskini rekod. Hubungi Admin');
        }
    }

    public function fetchStudent()
    {
        $url = 'http://localhost:808/api/student-pb';

        return redirect($url);

        //simpan data
        foreach ($resultSurvey as $result) {
            $result = json_decode(json_encode($result));
            // check if the record has been added previously.
            // if yes, overwrite. if not, create a new record
            $exist = Response::where('survey_id', $survey->id)
                ->where('question', $result->soalan)
                ->count();

            if ($exist == 0) {
                $response = new Response();
                $response->question = $result->soalan;
            } else {
                $response = Response::where('survey_id', $survey->id)
                    ->where('question', $result->soalan)
                    ->first();
            }

            $response->survey_id = $survey->id;
            $response->answer = $result->jawapan;
            $response->category = $category;

            // checking value remark
            if (isset($result->remark_1) && $result->remark_1 != '') {
                $response->remark_1 = $result->remark_1;
            }
            if (isset($result->remark_2) && $result->remark_2 != '') {
                $response->remark_2 = $result->remark_2;
            }
            if (isset($result->remark_2) && $result->remark_3 != '') {
                $response->remark_3 = $result->remark_3;
            }

            if ($response->save()) {
                $survey->status = 'processed';
                $survey->save();
                $saveStatus = 'pass';
            }
        }
        // once everything done already
        $data = [
            "saveStatus" => $saveStatus,
            "saveAt" => Carbon::now()
        ];

        return response()->json($data, 200);
    }

    public function mark($id, $batch)
    {
//        $url = 'http://localhost:808/api/espkm/result/'. $id . '/' . $batch;
//
//        return redirect($url);
//
//        //simpan data
//        foreach ($results as $result) {
//            $result = json_decode(json_encode($result));
//            // check if the record has been added previously.
//            // if yes, overwrite. if not, create a new record
//            $exist = Response::where('survey_id', $survey->id)
//                ->where('question', $result->soalan)
//                ->count();
//
//            if ($exist == 0) {
//                $response = new Response();
//                $response->question = $result->soalan;
//            } else {
//                $response = Response::where('survey_id', $survey->id)
//                    ->where('question', $result->soalan)
//                    ->first();
//            }
//
//            $response->survey_id = $survey->id;
//            $response->answer = $result->jawapan;
//            $response->category = $category;
//
//            // checking value remark
//            if (isset($result->remark_1) && $result->remark_1 != '') {
//                $response->remark_1 = $result->remark_1;
//            }
//            if (isset($result->remark_2) && $result->remark_2 != '') {
//                $response->remark_2 = $result->remark_2;
//            }
//            if (isset($result->remark_2) && $result->remark_3 != '') {
//                $response->remark_3 = $result->remark_3;
//            }
//
//            if ($response->save()) {
//                $survey->status = 'processed';
//                $survey->save();
//                $saveStatus = 'pass';
//            }
//        }
//        // once everything done already
//        $data = [
//            "saveStatus" => $saveStatus,
//            "saveAt" => Carbon::now()
//        ];
//
//        return response()->json($data, 200);

        $espkm = Espkm::where('ic_number', $id)->where('batch_id', $batch)->first();
        return view('board.mark', compact('espkm'));


    }
}


