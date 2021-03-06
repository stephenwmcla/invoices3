<?php

use App\InvoiceHeader;
use App\Http\Requests\CreateInvoiceHeaderRequest;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function() {
    return View::make('main');
});

Route::resource('InvoiceHeaders', 'InvoiceHeaderController');

Route::resource('InvoiceDetails', 'InvoiceDetailController');

Route::resource('InvoiceStatuses','InvoiceStatusController');

Route::resource('Clients','ClientsController');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
