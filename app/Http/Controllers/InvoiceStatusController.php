<?php

namespace App\Http\Controllers;

//use App\Http\Requests;
//use App\Http\Controllers\Controller;
//use Illuminate\Http\Request;
use App\InvoiceStatus;
//use App\Http\Requests\CreateInvoiceStatusRequest;

class InvoiceStatusController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $invoiceStatus = InvoiceStatus::all();
        return View::make('InvoiceStatuses.index')->with('invoiceStatus', $invoiceStatus);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('InvoiceStatuses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $validated = $request->validate();
        if ($validated->fails()) {
            echo "form not so good";
        } else {
            echo "form looks good";
        }
        $link = tap(new App\Link($data))->save();

        return redirect('/');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
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
