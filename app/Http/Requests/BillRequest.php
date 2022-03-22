<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class BillRequest extends FormRequest
{
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
    public function rules()
    {
        $payload = $this->all();

        $rules = [
            'unit'     => 'required|numeric',
         
            
        ];
        switch (request()->method()) {
		
            
            case 'POST':
               
                break;

            case 'PUT':
              
                break;

            case 'DELETE':
            
                break;

            default:
                # code...
                break;
        }


        
        return $rules;
    }
}
