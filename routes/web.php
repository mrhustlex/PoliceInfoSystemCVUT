<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// definition of http get, post, put, delete: https://www.w3schools.com/tags/ref_httpmethods.asp

Route::prefix('/')->group(function() {
    //view
    Route::get('/', function () {
        return view('index');
    });

    Route::get('/police_agent', 'PoliceAgentController@getPoliceMember');
});


Route::prefix('police_agent')->group(function() {
    //police agent api
    Route::get('/add', function (){
        return view('police_agent.add');
    });
    Route::post('/add', 'PoliceAgentController@addPoliceMember');
//    Route::put('/add', 'PoliceAgentController@addPoliceMember');
    Route::delete('/delete', 'PoliceAgentController@deletePoliceMember');
});