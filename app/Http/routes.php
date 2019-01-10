<?php

use App\InvoiceHeader;
use App\Client;
use App\InvoiceStatus;
use App\Http\Requests\CreateInvoiceHeaderRequest;
use App\Http\Requests\CreateInvoiceStatusRequest;

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

Route::get('viewInvoices', function() {
    $invoiceHeader = InvoiceHeader::all();
    return View::make('viewInvoices')->with('invoiceHeader', $invoiceHeader);
});

Route::get('maintainClients', function() {
    $clients = Client::all();
    return View::make('viewClients')->with('clients', $clients);
});

Route::get('maintainClients/edit/{client_id}', function($client_id) {
    
    $client = Client::find($client_id);
    return View::make('maintainClients')->with('client', $client);
});

Route::post('maintainClients/update/{client_id}', function($client_id) {
    
    $clients = Client::find($client_id);
    return View::make('maintainClients')->with('clients', $clients);
});

Route::get('createInvoice', function() {
    $clients = Client::lists('client_name','client_id');
    return View::make('createInvoice')->with('clients', $clients);
});

Route::get('maintainStatus', function() {
    $invoiceStatus = InvoiceStatus::all();
    return View::make('ViewInvoiceStatus')->with('invoiceStatus', $invoiceStatus);
});

Route::get('maintainStatus/create', function() {
//    $invoiceStatus = InvoiceStatus::all();
    return View::make('maintainInvoiceStatus');
});

Route::post('maintainInvoiceStatus/store', function(CreateInvoiceStatusRequest $request) {
    
    // handle insert or update
    $validated = $request->validated();
    if ($validated) {
        echo "form looks good";
    } else {
        echo "form not so good";
    }
    $link = tap(new App\Link($data))->save();

    return redirect('/');
});

Route::post('createInvoice/submit', function(CreateInvoiceHeaderRequest $request) {
    
    $validated = $request->validated();
    if ($validated) {
        echo "form looks good";
    } else {
        echo "form not so good";
    }
    $link = tap(new App\Link($data))->save();

    return redirect('/');
});


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
