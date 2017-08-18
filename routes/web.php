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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
    Route::get('menu', function () {
        return view('vendor/adminlte/layouts/app');
    });
    Route::get('Select', function () {
        return view('vendor/adminlte/layouts/appMain');
    });
    /*------------------ USERS'S ROUTES ------------------*/
    Route::resource('users','UserController');
    Route::get('/users/{user}/status','UserController@userStatus');
    /*------------------ SHIPMENT'S ROUTES ------------------*/
    Route::resource('shipments', 'ShipmentController');


    /*------------------ SHIPPER'S ROUTES ------------------*/
    Route::resource('shippers', 'ShipperController');
    Route::get('/shippers/{shipper}/status','ShipperController@shipperStatus');
    Route::resource('ports', 'PortController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

});
