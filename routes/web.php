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
    //unassigned view
    Route::get('/', function () {
        return view('index');
    });

});

Route::prefix('case')->group(function() {
    //index page of case
    Route::get('/', 'CaseController@getCaseIndex');
    //Case Api
    Route::get('/add',function (){
        return view('case.add');
    });
    Route::post('/add','CaseController@openCase');
    Route::get('/close','CaseController@closeCase');
    Route::get('/open','CaseController@reopenClosedCase');
    Route::get('/solve','CaseController@solveCase');
    Route::get('/detail', 'CaseController@getCaseDetail');
});

Route::prefix('police_agent')->group(function() {
   //index page of police agent
    Route::get('/', 'PoliceAgentController@getPoliceMemberIndex');
    //police agent api
    Route::get('/add', function (){
        return view('police_agent.add');
    });
    Route::post('/add', 'PoliceAgentController@addPoliceMember');
    Route::get('/detail', 'PoliceAgentController@getPoliceInformation');
//    Route::put('/add', 'PoliceAgentController@addPoliceMember');
    Route::delete('/delete', 'PoliceAgentController@deletePoliceMember');
});

Route::prefix('person_of_interest')->group(function() {
//    Route::get('/', 'PersonOfInterestController@getPersonOfInterestIndex');
    Route::get('/list', 'PersonOfInterestController@getPersonOfInterestList');
    Route::post('/add', 'PersonOfInterestController@addPersonOfInterest');
    Route::get('/delete', 'PersonOfInterestController@deletePersonOfInterest');
    Route::get('/set_suspect', 'PersonOfInterestController@setSuspect');
    Route::get('/set_witness', 'PersonOfInterestController@setWitness');
    Route::get('/set_victim', 'PersonOfInterestController@setVictim');
    Route::get('/set_criminal', 'PersonOfInterestController@setCriminal');
    Route::get('/role', 'PersonOfInterestController@getRole');
    Route::get('/detail', 'PersonOfInterestController@getPersonOfInterestDetail');
    Route::get('/add', 'PersonOfInterestController@getPersonOfInterestAddPage');
    Route::prefix('testimony')->group(function() {
        Route::post('/add', 'PersonOfInterestController@addTestimony');
        Route::get('/add', 'PersonOfInterestController@addTestimonyPage');
        Route::get('/', 'PersonOfInterestController@getTestimony');
    });
});