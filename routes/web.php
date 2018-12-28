<?php

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::get('/replacement/test', 'Frontend\ReplacementController@indexpayment');
Route::get('/pelajar/{id}', 'Api\PelajarController@view');
Route::post('/semak-status', 'Frontend\StatusController@show');
Route::get('/semak-status', 'Frontend\StatusController@checkStatus');

################### BAck end #######################################

Route::get('/logout', 'Auth\LoginController@logout');

//
Route::group(['middleware' => ['audit', 'role:company']], function () {

    //company
    Route::get('/company-download', 'Frontend\CompanyController@index');
    Route::get('/company-search/post', 'Frontend\CompanyController@search');
    Route::post('/company-search/post', 'Frontend\CompanyController@searchResult');
    Route::get('/company-post/create/{id}', 'Frontend\CompanyController@create');
    Route::post('/company-post/create/{id}', 'Frontend\CompanyController@store');
    Route::get('/company-download/show/{id}', 'Frontend\CompanyController@show');
    Route::get('/company-search/list', 'Frontend\CompanyController@companyPost');
    Route::get('/company-download/list/{batch}', 'Frontend\CompanyController@list');
    Route::get('/company-download/state/{type}', 'Frontend\CompanyController@state');
    Route::get('/company-download/download/{batch}', 'Frontend\CompanyController@export'); //download batch
    Route::get('/company-download/single/{id}', 'Frontend\CompanyController@exportSingle'); //download single
    Route::get('/company-list/set-flag/{flag}/{id}', 'Frontend\CompanyController@setFlag');
    Route::post('/company-download/statelist/{id}', 'Frontend\CompanyController@exportAll');
    Route::get('/company-post/list/{batch}/{type}', 'Frontend\CompanyController@searchList');
    Route::get('/company-download/statelist/{id}/{type}', 'Frontend\CompanyController@stateList');
    Route::get('/company-download/printed/{id}/{type}', 'Frontend\CompanyController@createSiries');
    Route::post('/company-download/printed/{id}/{type}', 'Frontend\CompanyController@storeSiries');
    Route::get('/company-post/create-batch/{batch}/{type}', 'Frontend\CompanyController@createBatch');
    Route::post('/company-post/create-batch/{batch}/{type}', 'Frontend\CompanyController@storeBatch');
    //edit after post -- single
    Route::get('/company-search/detail/{id}', 'Frontend\CompanyController@editPost');
    Route::post('/company-search/detail/{id}', 'Frontend\CompanyController@updatePost');
    //edit batch after post
    Route::get('/company-search/detail-batch/{id}', 'Frontend\CompanyController@editPostBatch');
    Route::post('/company-search/detail-batch/{id}', 'Frontend\CompanyController@updatePostBatch');
    Route::get('/company-search/detail-student/{id}', 'Frontend\CompanyController@detailStudentPost');


    Route::get('/company-report', 'Frontend\CompanyController@reportChoice');
    Route::get('/company-report/{type}', 'Frontend\CompanyController@reportList');
    Route::get('/company-report/{type}/{siri}', 'Frontend\CompanyController@reportListSession');
    Route::get('/company-print/edit/{id}', 'Frontend\CompanyController@edit');
    Route::post('/company-print/edit/{id}', 'Frontend\CompanyController@update');
    Route::get('/company-print/search', 'Frontend\CompanyController@searchPrint');
    Route::post('/company-print/search', 'Frontend\CompanyController@printResult');
    Route::post('/company-report/pdf/F', 'Frontend\CompanyController@showFMultiReport');
    Route::post('/company-report/pdf/G', 'Frontend\CompanyController@showGMultiReport');
    Route::get('/company-print/search-edit', 'Frontend\CompanyController@searchEditPrint');
    Route::post('/company-print/search-edit', 'Frontend\CompanyController@printEditResult');
    Route::get('/company-print/edit-batchlist/{batch}', 'Frontend\CompanyController@editList');
    Route::get('/company-report/pdf/F/{batch}/{type}', 'Frontend\CompanyController@showFReport');
    Route::get('/company-report/pdf/G/{batch}/{type}', 'Frontend\CompanyController@showGReport');
    Route::get('/company-print/edit-certificatebatch/{batch}/{type}', 'Frontend\CompanyController@editCertificate');
    Route::post('/company-print/edit-certificatebatch/{batch}/{type}', 'Frontend\CompanyController@UpdateCertificate');

    // User session
    Route::get('/user/profile', 'Frontend\UserController@profile');
    Route::get('/user/edit-profile', 'Frontend\UserController@editProfile');
    Route::post('/user/edit-profile', 'Frontend\UserController@updateProfile');
    Route::get('/user/change-password', 'Frontend\UserController@changePassword');
    Route::post('/user/change-password', 'Frontend\UserController@updatePassword');

});

// pencetak ONLY
Route::group(['middleware' => ['audit', 'role:pencetak']], function () {

    Route::get('/dashboard', 'Frontend\DashboardController@index');

    ////board
    //Route::get('/board/type', 'Frontend\BoardController@index');
    //Route::get('/board/state/{type}', 'Frontend\BoardController@state');
    //Route::get('/board/show/{id}', 'Frontend\BoardController@show');
    //Route::get('/board/edit/{id}', 'Frontend\BoardController@edit');
    //Route::post('/board/edit/{id}', 'Frontend\BoardController@update');
    //Route::get('/board/statelist/{id}', 'Frontend\BoardController@stateList');
    //Route::post('/board/statelist/{id}', 'Frontend\BoardController@updateState');
    //Route::get('/board/list/{batch}', 'Frontend\BoardController@list');
    //Route::get('/board/list-done', 'Frontend\BoardController@listBatch');
    //Route::get('/board/list-tolak', 'Frontend\BoardController@listTolak');
    //Route::get('/board/list-kiv', 'Frontend\BoardController@listKiv');
    //Route::get('/board/list-done/{batch}', 'Frontend\BoardController@detailDone');
    //Route::get('/board/list-tolak/{batch}', 'Frontend\BoardController@detailReject');
    //Route::get('/board/list-kiv/{batch}', 'Frontend\BoardController@detailKiv');
    //Route::get('/board/set-flag/{flag}/{id}', 'Frontend\BoardController@setFlag');
    //Route::get('/board/mark/{id}/{batch}', 'Frontend\BoardController@mark');

    //diploma
    Route::get('/diploma/batch', 'Frontend\DiplomaController@type');
    Route::get('/diploma/batch/{type}', 'Frontend\DiplomaController@batch');
    Route::get('/diploma/list/{id}', 'Frontend\DiplomaController@diplomaList');
    Route::get('/diploma/edit-list/{id}', 'Frontend\DiplomaController@diplomaeditList');
    Route::post('/diploma/edit-list/{id}', 'Frontend\DiplomaController@diplomaupdateList');
    Route::get('/diploma', 'Frontend\DiplomaController@index');
    Route::get('/diploma/create', 'Frontend\DiplomaController@create');
    Route::post('/diploma/create', 'Frontend\DiplomaController@store');
    Route::get('/diploma/edit-batch/{id}', 'Frontend\DiplomaController@editBatch');
    Route::post('/diploma/edit-batch/{id}', 'Frontend\DiplomaController@updateBatch');
    Route::get('/diploma/edit/{id}', 'Frontend\DiplomaController@edit');
    Route::post('/diploma/edit/{id}', 'Frontend\DiplomaController@update');
    Route::get('/diploma/show', 'Frontend\DiplomaController@show');
    Route::get('/diploma/destroy/{id}', 'Frontend\DiplomaController@destroy');


    //Cetificates
    Route::get('/certificate/type', 'Frontend\CertificateController@type');
    Route::get('/certificate/job/{id}', 'Frontend\CertificateController@job');
    Route::post('/certificate/job/{id}', 'Frontend\CertificateController@jobRotation');
    Route::get('/certificate/edit/{id}', 'Frontend\CertificateController@edit');
    Route::get('/certificate/show/{id}', 'Frontend\CertificateController@show');
    Route::post('/certificate/edit/{id}', 'Frontend\CertificateController@update');
    Route::get('/certificate/state/{type}', 'Frontend\CertificateController@state');
    Route::get('/certificate/batch/{batch}', 'Frontend\CertificateController@show');
    Route::get('/certificate/list-done', 'Frontend\CertificateController@list_done');
    Route::get('/certificate/destroy/{id}', 'Frontend\CertificateController@destroy');
    Route::get('/certificate/done-batch', 'Frontend\CertificateController@doneBatch');
    Route::post('/certificate/batch/{batch}', 'Frontend\CertificateController@update');
    Route::get('/certificate/job-done/{batch}', 'Frontend\CertificateController@jobDone');
    Route::get('/certificate/list/{batch}/{type}', 'Frontend\CertificateController@index');
    Route::get('/certificate/set-flag/{flag}/{id}', 'Frontend\CertificateController@setFlag');
    Route::get('/certificate/statelist/{id}/{type}', 'Frontend\CertificateController@stateList');
    Route::post('/certificate/statelist/{id}/{type}', 'Frontend\CertificateController@updateState');

    //agihan semula
    Route::get('/certificate/type/redistribute', 'Frontend\CertificateController@typeredistribute');
    Route::get('/certificate/redistribute/{type}', 'Frontend\CertificateController@redistribute');
    Route::get('/certificate/done-batch/redistribute', 'Frontend\CertificateController@doneredistribute');
    Route::get('/certificate/agih/{id}', 'Frontend\CertificateController@redistributeSource');
    Route::post('/certificate/agih/{id}', 'Frontend\CertificateController@redistributeupdateSource');

    //untuk print
    Route::get('/print', 'Frontend\PrintedController@inbox');
    Route::get('/print/show/{id}', 'Frontend\PrintedController@show');
    Route::get('/print/edit/{id}', 'Frontend\PrintedController@edit');
    Route::post('/print/edit/{id}', 'Frontend\PrintedController@update');
    Route::get('/print/list-done', 'Frontend\PrintedController@listDone');
    Route::get('/print/destroy/{id}', 'Frontend\PrintedController@destroy');
    Route::get('/print/printed/{batch}', 'Frontend\PrintedController@reportPdf');
    Route::get('/print/print/{id}', 'Frontend\PrintedController@singleReportPdf');
    Route::get('/print/set-flag/{flag}/{id}', 'Frontend\PrintedController@setFlag');
    Route::get('/print/print-single/{id}', 'Frontend\PrintedController@printSingle');
    Route::get('/print/list-detail/{batch}', 'Frontend\PrintedController@listDetail');
    Route::post('/print/print-single/{id}', 'Frontend\PrintedController@updateSingle');
    Route::get('/print/print-list/{batch}/{type}', 'Frontend\PrintedController@index');
    Route::get('/print/print/{batch}/{type}', 'Frontend\PrintedController@createSiries');
    Route::post('/print/print/{batch}/{type}', 'Frontend\PrintedController@storeSiries');
    Route::get('/print/reedit', 'Frontend\PrintedController@searchEditPrint');
    Route::post('/print/reedit', 'Frontend\PrintedController@printEditResult');
    Route::get('/print/edit-batchlist/{batch}', 'Frontend\PrintedController@editList');


    //post
    Route::get('/post/search', 'Frontend\PostController@search');
    Route::post('/post/search', 'Frontend\PostController@searchResult');
    Route::get('/post/batch', 'Frontend\PostController@listDoneBatch');
    Route::get('/post', 'Frontend\PostController@index');
    Route::get('/post/company', 'Frontend\PostController@company');
    Route::post('post/create/{id}', 'Frontend\PostController@store');
    Route::get('/post/create/{id}', 'Frontend\PostController@create');
    Route::get('/post/create-batch/{batch}/{type}', 'Frontend\PostController@createBatch');
    Route::post('/post/create-batch/{batch}/{type}', 'Frontend\PostController@storeBatch');
    Route::get('/post/list/{batch}/{type}', 'Frontend\PostController@searchList');
    Route::get('/post/detail-batch/{id}', 'Frontend\PostController@editPostBatch');
    Route::post('/post/detail-batch/{id}', 'Frontend\PostController@updatePostBatch');
    Route::get('/post/detail-student/{id}', 'Frontend\PostController@detailStudentPost');
//    /edit after post -- single
    Route::get('/post/detail/{id}', 'Frontend\PostController@editPost');
    Route::post('/post/detail/{id}', 'Frontend\PostController@updatePost');

    //status
    Route::get('/status/search', 'Frontend\StatusController@search');
    Route::post('/status/search', 'Frontend\StatusController@searchResult');
    Route::get('/status/{id}', 'Frontend\StatusController@adminStatus');

    //carian
    Route::get('/search', 'Frontend\SearchController@search');
    Route::post('/search', 'Frontend\SearchController@searchResult');

    //replacement
    Route::get('/replacement', 'Frontend\ReplacementController@index');
    Route::get('/replacement/search', 'Frontend\ReplacementController@search');
    Route::post('/replacement/search', 'Frontend\ReplacementController@searchResult');
    Route::get('/replacement/list/{id}', 'Frontend\ReplacementController@list');
    Route::get('/replacement/show/{id}/{cn}', 'Frontend\ReplacementController@show');
    Route::get('/replacement/destroy/{id}', 'Frontend\ReplacementController@destroy');
    Route::get('/replacement/epayment/{id}', 'Frontend\ReplacementController@payment');
    Route::get('/replacement/create/{id}/{cn}', 'Frontend\ReplacementController@create');
    Route::get('/replacement/payment/{id}', 'Frontend\ReplacementController@payNow');
    Route::post('/replacement/create/{id}/{cn}', 'Frontend\ReplacementController@store');
//    Route::post('/replacement/epayment/{id}', 'Frontend\ReplacementController@storePayment');
    Route::get('/replacement/receipt/{id}', 'Frontend\ReplacementController@receipt');


    //report
    Route::get('/report', 'Frontend\ReportController@index');    
    //Route::get('/report/f2', 'Frontend\ReportController@reportF2'); // ndt
    //Route::get('/report/f3', 'Frontend\ReportController@reportF3'); // pb
    //Route::get('/report/f4', 'Frontend\ReportController@reportF4'); // sldn
    //Route::get('/report/f1', 'Frontend\ReportController@reportF'); // ppt
    Route::get('/report/f/{type}', 'Frontend\ReportController@searchf');
    Route::post('/report/f/{type}', 'Frontend\ReportController@reportf');
    Route::get('/report/g/{type}', 'Frontend\ReportController@searchg');
    Route::post('/report/g/{type}', 'Frontend\ReportController@reportg');

    Route::get('/report/download', 'Frontend\ReportController@export');
    Route::post('/report/f1', 'Frontend\ReportController@reportF1');
});

Route::group(['middleware' => ['audit', 'role:akauntan']], function () {
    //pengesahan bayaran
    Route::get('/finance/list', 'Frontend\FinanceController@list'); // dah selesai
    Route::get('/finance/confirm', 'Frontend\FinanceController@index');
    Route::get('/finance/create/{batch}', 'Frontend\FinanceController@create');
    Route::post('/finance/create/{batch}', 'Frontend\FinanceController@storeBatch');
    Route::get('/finance/report-g/{batch}/{type}', 'Frontend\FinanceController@showGReport');
    Route::get('/finance/report-f/{batch}/{type}', 'Frontend\FinanceController@showFReport');
});

//// Route for view/blade file.
//    Route::get('importExport', 'Frontend\CompanyController@importExport');
//// Route for export/download tabledata to .csv, .xls or .xlsx
//    Route::get('downloadExcel/{type}', 'Frontend\CompanyController@downloadExcel');
//// Route for import excel data to database.
//    Route::post('importExcel', 'Frontend\CompanyController@importExcel');
//
////api espkm
//    Route::get('/board/fetch-data', 'Frontend\BoardController@fetchStudent');



// SUPER ADMIN ONLY
Route::group(['middleware' => ['audit', 'role:super_admin']], function () {
// User
    Route::get('/user', 'Frontend\UserController@index');
    Route::get('/user/create', 'Frontend\UserController@create');
    Route::post('/user/create', 'Frontend\UserController@store');
    Route::get('/user/show/{id}', 'Frontend\UserController@show');
    Route::get('/user/edit/{id}', 'Frontend\UserController@edit');
    Route::post('/user/edit/{id}', 'Frontend\UserController@update');
    Route::get('/user/destroy/{id}', 'Frontend\UserController@destroy');
    Route::get('/user/reset-password/{id}', 'Frontend\UserController@resetPassword');

    // Audit
    Route::get('/audit-trail', 'Frontend\AuditTrailController@index');
    Route::get('/audit-trail/show/{id}', 'Frontend\AuditTrailController@show');
    Route::post('/audit-trail/update/{id}', 'Frontend\AuditTrailController@update');
    Route::get('/audit-trail/destroy/{id}', 'Frontend\AuditTrailController@destroy');
    Route::get('/audit-trail/set/{flag}/{id}', 'Frontend\AuditTrailController@setFlag');

    // Lookups
    Route::get('/lookups/role', 'Frontend\RoleController@index');
    Route::get('/lookups/role/{id}', 'Frontend\RoleController@show');
    Route::get('/lookups/role/edit/{id}', 'Frontend\RoleController@edit');
    Route::post('/lookups/role/edit/{id}', 'Frontend\RoleController@update');
    Route::get('/lookups/role/destroy/{id}', 'Frontend\RoleController@destroy');

    //setting sys var
    Route::get('/settings/sysvar', 'Frontend\SysvarsController@index');
    Route::get('/settings/sysvar/{var}', 'Frontend\SysvarsController@show');
    Route::post('/settings/sysvar/{var}', 'Frontend\SysvarsController@update');
});
