<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StoreCompany extends FormRequest
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
            "name"=>"required",
            "email" =>[
                "nullable",
                "email",
                Rule::unique('companies', 'email')->ignore($request->id??false),
            ],
            "logo"=>"file|image|dimensions:min_width=100,min_height=100|max:".getUploadMaxValue(),
            "website"=>"nullable|url",
        ];
    }
}
