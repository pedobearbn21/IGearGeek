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
Route::get('/abc', function(){
    return '1';
});
Route::post('/report','OnleaveController@savereport');
Route::post('/getchart','ChartController@getonleavechart');
Route::post('/upload', 'OnleaveController@uploadImage');

Route::post('/sentlate', 'OnleaveController@savelate');
Route::post('/latechart', 'ChartController@latechart');

Route::get('/getallreport', 'OnleaveController@getallreport');
Route::get('/getreport', 'WorklateController@getreport');

Route::get('/getallonleaves', 'OnleaveController@getallonleaves');
Route::get('/getallworklate', 'WorklateController@getallworklate');


Route::post('/updatestatusonleave/{id}', 'OnleaveController@updatestatusonleave');
Route::post('/updatestatuslate/{id}', 'WorklateController@updatestatuslate');

Route::get('/getreportonleaves/{id}', 'OnleaveController@getreportbyuser');
Route::get('/getreportworklate/{id}', 'WorklateController@getreportworklate');

Route::post('/deleteonleave/{id}', 'OnleaveController@deleteonleave');
Route::post('/deletelate/{id}', 'WorklateController@deletelate');


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});

