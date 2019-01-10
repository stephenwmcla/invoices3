<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateInvoiceHeaderRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'client_id' => 'required|exists:clients,client_id',
            'invoice_name' => 'required|max:45',
            'invoice_amount' => 'required|max:45|numeric',
            'invoice_date' => 'required|date',
        ];
    }
    
    public function messages() {
        return [
            'client_id.required' => 'Client Required',
            'invoice_name.required' => 'Invoice Name Required',
            'invoice_amount.required' => 'Please Enter an Invoice Amount',
            'invoice_date.required' => 'Please Enter an Invoice Date',
        ];
        
    }

}
