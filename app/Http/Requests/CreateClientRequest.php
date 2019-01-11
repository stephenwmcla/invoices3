<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateClientRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
    public function rules() {
        return [
            'client_name' => 'required',
            'address_1' => 'required|max:45',
            'invoice_prefix' => 'required|max:5',
            'next_invoice_no' => 'required|numeric',
        ];
    }
    
    public function messages() {
        return [
            'client_name.required' => 'Please enter a client name',
            'address_1.required' => 'Address 1 Required',
            'invoice_prefix.required' => 'Please enter an invoice prefix',
            'next_invoice_no.required' => 'Please enter a next invoice number',
        ];
        
    }

}
