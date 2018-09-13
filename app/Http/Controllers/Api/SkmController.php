<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SkmController extends Controller
{
    //
    public function store(Request $request)
    {
        // capture data
        $category = $request->input('category');
        $resultSurvey = $request->input('resultSurvey');
        $saveStatus = 'saved';

        // process result survey and store in responses table
        if ($saveStatus == 'saved') {
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
        }

        // once everything done already
        $data = [
            "saveStatus" => $saveStatus,
            "saveAt" => Carbon::now()
        ];

        return response()->json($data, 200);


    }
}
