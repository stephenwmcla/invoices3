<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateInvoiceDetailRequest extends Request {

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
            'invoice_line_amount' => 'required|min:1|max:99999|numeric',
            'invoice_detail' => 'required',
        ];
    }

    public function messages() {
        return [
            'invoice_detail.required' => 'Please enter invoice item details',
            'invoice_line_amount.required' => 'Please Enter an Invoice Amount',
        ];
        
    }

}
