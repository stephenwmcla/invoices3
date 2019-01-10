<?php

class InvoiceController extends \BaseController {

    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return View
     */
    
    public function create(Request $request) {
//        return view('user.profile', ['user' => User::findOrFail($id)]);
        echo "create";
        var_dump($request);
    }

    public function store(Request $request) {
//        return view('user.profile', ['user' => User::findOrFail($id)]);
        echo "store";
        var_dump($request);
    }

}