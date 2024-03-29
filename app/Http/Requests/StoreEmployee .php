<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreEmployee extends FormRequest
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
    public function rules(Request $request)
    {
        return [
            "first_name"=>"required",
            "last_name"=>"required",            
            "email" =>[
                "nullable",
                "email",
                Rule::unique('employees', 'email')->ignore($request->id??false),
            ],
            "phone"=>"nullable|regex:/^\+?[1-9]\d{1,14}$/i",            
            "company_id"=>"nullable|numeric",
        ];
    }
}
