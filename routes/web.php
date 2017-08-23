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

Route::group(['middleware' => 'auth'], function () {
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });
    Route::resource('shipments', 'ShipmentController');

    /*------------------ SHIPPER'S ROUTES ------------------*/
    Route::resource('shippers', 'ShipperController');
    Route::get('/shippers/{shipper}/status','ShipperController@shipperStatus');
    Route::resource('ports', 'PortController');

    /*------------------ SUPPLIERS'S ROUTES ------------------*/
    Route::resource('suppliers', 'SupplierController');
    Route::get('/suppliers/{supplier}/status','SupplierController@supplierStatus');

    /*------------------ BANK ACCOUNT'S ROUTES ------------------*/
    Route::resource('bank-accounts', 'BankAccountController');
    Route::get('/bank-accounts/{bankAccount}/status','BankAccountController@bankAccountStatus');

    /*------------------ ADDITIONAL CHARGE'S ROUTES ------------------*/
    Route::resource('additional-charges', 'AdditionalChargeController');
    Route::get('/additional-charges/{additionalCharge}/status','AdditionalChargeController@additionalChargeStatus');

    /*------------------ CONTACT'S ROUTES ------------------*/
    Route::resource('contacts', 'SupplierContactController');
    Route::get('/contacts/{supplierContact}/status','SupplierContactController@supplierContactStatus');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

});
