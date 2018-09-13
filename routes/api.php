<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/esijil/pelajar/{id}', 'Api\PelajarController@show'); //semak status pelajar by qrcode
Route::post('/board/pelajar', 'Api\SkmController@store'); //tarik data pelajar skm - PB
Route::post('/pelajar', 'Api\SkmController@student'); //tarik data pelajar skm - pengajian lain