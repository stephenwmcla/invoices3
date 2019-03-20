<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Client;
use App\Http\Requests\CreateClientRequest;

class ClientsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $clients = Client::all();
        return View('Clients.index', array('clients' => $clients));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return view('Clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(CreateClientRequest $request) {

        $clients = new Client();
        $clients->client_name = $request->client_name;
        $clients->address_1 = $request->address_1;
        $clients->address_2 = $request->address_2;
        $clients->address_3 = $request->address_3;
        $clients->county = $request->county;
        $clients->postcode = $request->postcode;
        $clients->client_contact = $request->client_contact;
        $clients->invoice_prefix = $request->invoice_prefix;
        $clients->next_invoice_no = $request->next_invoice_no;
        $clients->save();
        return redirect('/Clients');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $client = Client::find($id);
        return View('Clients.show', array('clients' => $client));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $client = Client::find($id);
        return View('Clients.edit', array('clients' => $client));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(CreateClientRequest $request, $id) {

        $clients = Client::find($id);
        $clients->client_name = $request->client_name;
        $clients->address_1 = $request->address_1;
        $clients->address_2 = $request->address_2;
        $clients->address_3 = $request->address_3;
        $clients->county = $request->county;
        $clients->postcode = $request->postcode;
        $clients->client_contact = $request->client_contact;
        $clients->invoice_prefix = $request->invoice_prefix;
        $clients->next_invoice_no = $request->next_invoice_no;
        $clients->save();

//        Session::flash('message', 'Status Updated');
        return redirect('/Clients/');
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
