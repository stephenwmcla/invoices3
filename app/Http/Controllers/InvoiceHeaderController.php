<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InvoiceHeader;
use App\InvoiceDetail;
use App\Client;
use App\Http\Requests\CreateInvoiceHeaderRequest;
use Session;
use Illuminate\Support\Facades\Redirect;

class InvoiceHeaderController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $invoiceHeader = InvoiceHeader::all();
        return View('InvoiceHeaders.index', array('invoiceHeader' => $invoiceHeader));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $clients = Client::lists('client_name', 'client_id');
        return view('InvoiceHeaders.create', array('clients' => $clients));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateInvoiceHeaderRequest $request) {
        
        $invoiceHeader = new InvoiceHeader;
        $invoiceHeader->client_id = $request->client_id;
        $clients = Client::find($request->client_id);
        $invoiceHeader->invoice_number = $clients->invoice_prefix . str_pad($clients->next_invoice_no, 3, "0", STR_PAD_LEFT);
        $invoiceHeader->invoice_date = $request->invoice_date;
        $invoiceHeader->invoice_amount = 0;
        $invoiceHeader->invoice_status = 0;
        $invoiceHeader->save();
        $clients->next_invoice_no++;
        $clients->save();
        
        Session::flash('message', 'Invoice raised');
        return Redirect::to('/InvoiceHeaders/' . $invoiceHeader->invoice_uid . "/edit/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
        //view the invoice pdf here
        $invoiceHeader = InvoiceHeader::find($id);
        return View('InvoiceHeaders.show', array('invoiceHeader' => $invoiceHeader));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $invoiceHeader = InvoiceHeader::find($id);
        $clients = Client::lists('client_name', 'client_id');
        $invoiceDetail = InvoiceDetail::where('invoice_uid', '=', $invoiceHeader->invoice_uid)->get();
        return View('InvoiceHeaders.edit', array('invoiceHeader' => $invoiceHeader, 'clients' => $clients, 'invoiceDetail' => $invoiceDetail));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CreateInvoiceHeaderRequest $request, $id) {

        $invoiceHeader = InvoiceHeader::find($id);
        $invoiceHeader->client_id = $request->client_id;
        $invoiceHeader->invoice_date = $request->invoice_date;
        $invoiceHeader->save();
        
        Session::flash('message', 'Invoice raised');
        return Redirect::to('/InvoiceHeaders/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
