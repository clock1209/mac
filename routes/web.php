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
    Route::get('/shippers/{shipper}/status','ShipperController@shipperStatus');
    Route::resource('shippers', 'ShipperController');
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
    Route::get('/contacts/{supplierContact}/edit-contact', 'SupplierContactController@edit')->name('contacts.edit');
    Route::put('/contacts/{supplierContact}/update-contact', 'SupplierContactController@update')->name('contacts.update');
    Route::get('/contacts/{supplierContact}/status','SupplierContactController@supplierContactStatus');

    /*------------------ CONSOLIDATOR'S ROUTES ------------------*/
    Route::resource('consolidators','ConsolidatorController');

    /*------------------ CONCEPTS'S ROUTES ------------------*/
    Route::get('concepts/datos', 'ConceptsController@getconcepts')->name('datatable.concepts');
    Route::post('concepts/updates/{id}','ConceptsController@edit');
    Route::get('/concepts/{shipper}/status','ShipperController@shipperStatus');
    Route::get('concepts', function () {
        return view('/concepts/index');
    });
    Route::resource('concepts', 'ConceptsController');

    /*------------------ STUFF'S ROUTES ------------------*/
    Route::resource('stuffs', 'StuffController');

    /*------------------ GET IMG ------------------*/
    Route::get('/userimage/{filename}',[
        'users' => 'UserController@getUserImage',
        'as' => 'account.image'
    ]);

    /*------------------ role'S ROUTES ------------------*/
    Route::resource('roles','RolesController');

    // 	****************** PERMISSION ROUTES ******************
    Route::get('/permisos','PermissionController@index');
    Route::get('/permisos/asignar','PermissionController@asignar');
    Route::get('/permisos/desasignar','PermissionController@desasignar');














    /*------------------ CUSTOMER'S ROUTES ------------------*/
    Route::resource('customers','CustomerController');
    Route::get('/customers/{customer}/status','CustomerController@CustomerStatus');
    Route::get('CustomersBrokersDelete', 'CustomerController@deleteCustomerBroker');

    /*------------------ CUSTOMER BROKER ROUTES ------------------*/
    Route::resource('broker','BrokerController');
    Route::get('/broker/{broker}/status','BrokerController@BrokerStatus');

    /*------------------ DOC'S ROUTES ------------------*/
    Route::resource('docs','DocController');

    /*------------------ DOC'S ROUTES ------------------*/
    Route::resource('mcc','MccController');

    /*------------------ CARRIER'S ROUTES ------------------*/
    Route::resource('carriers','CarrierController');

    /*------------------ CARRIER PORT'S ROUTES ------------------*/
    Route::resource('carrierport','CarrierPortController');

    /*------------------ CARRIER PORT'S ROUTES ------------------*/
    Route::resource('prices','PriceController');

    /*------------------ REMARK'S ROUTES ------------------*/
    Route::resource('remarks','RemarkController');

    /*------------------ OVERWEIGHT'S ROUTES ------------------*/
    Route::resource('overweight','OverweightController');

    /*------------------ SUBJECT'S ROUTES ------------------*/
    Route::resource('subject','SubjectController');

    /*------------------ INLANDS'S ROUTES ------------------*/
    Route::resource('inlandscharges','InlandController');

    /*------------------ COUNTRIES'S ROUTES ------------------*/
    Route::resource('countries','CountryController');

    /*------------------ COUNTRIES'S ROUTES ------------------*/
    Route::resource('cities','CityController');

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes

});
