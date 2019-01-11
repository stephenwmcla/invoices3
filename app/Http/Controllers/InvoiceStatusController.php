<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\InvoiceStatus;
use App\Http\Requests\CreateInvoiceStatusRequest;
use Illuminate\Support\Facades\Redirect;

class InvoiceStatusController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $invoiceStatus = InvoiceStatus::all();
        return View('InvoiceStatuses.index', array('invoiceStatus' => $invoiceStatus));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('InvoiceStatuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateInvoiceStatusRequest $request) {
        $invoiceStatus = new InvoiceStatus;
        $invoiceStatus->status_id = $request->status_id;
        $invoiceStatus->status_description = $request->status_description;
        $invoiceStatus->save();

//        Session::flash('message', 'Status Created');
        return redirect('/InvoiceStatuses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {

        $invoiceStatus = InvoiceStatus::find($id);
        return View('InvoiceStatuses.edit', array('invoiceStatus' => $invoiceStatus));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id) {

        $invoiceStatus = InvoiceStatus::find($id);
        $invoiceStatus->status_description = $request->status_description;
        $invoiceStatus->save();

//        Session::flash('message', 'Status Updated');
        return redirect('/InvoiceStatuses/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $invoiceStatus = InvoiceStatus::find($id);
        $invoiceStatus->delete();
        return redirect('/InvoiceStatuses')->with('success','The record has been deleted');
        
    }

}
