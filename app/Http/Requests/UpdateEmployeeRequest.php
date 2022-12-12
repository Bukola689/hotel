<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
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
        return [
            'name' => 'required',
            'd_o_b' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'hire_date' => 'nullable|date',
            'phone_number' => 'required',
            'image' => 'required',
            'email' => 'required',
            'address' => 'required'
        ];
    }
}
