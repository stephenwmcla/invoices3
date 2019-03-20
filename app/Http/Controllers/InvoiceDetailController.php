<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InvoiceHeader;
use App\InvoiceDetail;
use App\Client;
use App\Http\Requests\CreateInvoiceDetailRequest;
use Session;
use Illuminate\Support\Facades\Redirect;

class InvoiceDetailController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $invoiceDetail = InvoiceDetail::all();
        return View('InvoiceDetails.index', array('invoiceDetail' => $invoiceDetail));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $invoiceHeader = InvoiceHeader::find($request->id);
        $clients = Client::find($invoiceHeader->client_id);
        if ($request->invoice_line_number == "") {
            $invoiceDetail = InvoiceDetail::where('invoice_uid', '=', $invoiceHeader->invoice_uid)->max('invoice_line_no');
            $invoiceLineNumber = $invoiceDetail + 1;
        }
        return View('InvoiceDetails.create', array('invoiceHeader' => $invoiceHeader, 'clients' => $clients, 'invoiceLineNumber' => $invoiceLineNumber));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateInvoiceDetailRequest $request) {
        $invoiceDetail = new InvoiceDetail;
        $invoiceDetail->invoice_uid = $request->invoice_uid;
        $invoiceDetail->invoice_line_no = $request->invoice_line_no;
        $invoiceDetail->invoice_line_amount = $request->invoice_line_amount;
        $invoiceDetail->invoice_detail = $request->invoice_detail;
        $invoiceDetail->save();
        $invoiceHeader = InvoiceHeader::find($invoiceDetail->invoice_uid);
        $invoiceTotal = InvoiceDetail::where('invoice_uid', '=', $invoiceHeader->invoice_uid)->sum('invoice_line_amount');
        $invoiceHeader->invoice_amount = round($invoiceTotal,2);
        $invoiceHeader->save();

        Session::flash('message', 'Invoice raised');
        return Redirect::to('/InvoiceHeaders/' . $invoiceDetail->invoice_uid . "/edit");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $invoiceDetail = InvoiceDetail::find($id);
        $invoiceHeader = InvoiceHeader::find($invoiceDetail->invoice_uid);
        $clients = Client::find($invoiceHeader->client_id);
        return View('InvoiceDetails.edit', array('invoiceHeader' => $invoiceHeader, 'clients' => $clients, 'invoiceDetail' => $invoiceDetail));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CreateInvoiceDetailRequest $request, $id) {
        $invoiceDetail = InvoiceDetail::find($id);
        $invoiceDetail->invoice_line_amount = $request->invoice_line_amount;
        $invoiceDetail->invoice_detail = $request->invoice_detail;
        $invoiceDetail->save();
        $invoiceHeader = InvoiceHeader::find($invoiceDetail->invoice_uid);
        $invoiceTotal = InvoiceDetail::where('invoice_uid', '=', $invoiceHeader->invoice_uid)->sum('invoice_line_amount');
        $invoiceHeader->invoice_amount = round($invoiceTotal,2);
        $invoiceHeader->save();


        Session::flash('message', 'Invoice raised');
        return Redirect::to('/InvoiceHeaders/' . $invoiceDetail->invoice_uid . "/edit");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $invoiceDetail = InvoiceDetail::find($id);
        $invoiceDetail->delete();
        return Redirect::to('/InvoiceHeaders/' . $invoiceDetail->invoice_uid . "/edit")->with('success', 'The record has been deleted');
    }

}
