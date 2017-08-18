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

Route::get('/', function () {
    return view('vendor/adminlte/auth/login');
});


Route::get('menu', function () {
    return view('vendor/adminlte/layouts/app');
});

Route::get('Select', function () {
    return view('vendor/adminlte/layouts/appMain');
});

Route::get('users', function () {
    return view('vendor/adminlte/layouts/users/index');
});

Route::get('concepts', function () {
    return view('/concepts/index');
});

Route::get('concepts/datos', 'ConceptsController@getconcepts')->name('datatable.concepts');
Route::post('concepts/updates/{id}','ConceptsController@edit');
//Route::resource('concepts', 'ConceptsController');
Route::get('/concepts/{shipper}/status','ShipperController@shipperStatus');

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });


    /*------------------ SHIPPER'S ROUTES ------------------*/
    Route::resource('shippers', 'ShipperController');
    Route::get('/shippers/{shipper}/status','ShipperController@shipperStatus');
    Route::resource('ports', 'PortController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

});
