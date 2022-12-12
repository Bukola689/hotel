<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
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
            'name' => 'required',
            'room_type_id' => 'required',
            'total_number' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'id_card' => 'required',
            'date' => 'required',
            'time' => 'required',
            'phone_number' => 'required',
            'status' => 'required',
            'image' => 'required',
            'nationality' => 'required',
            'state' => 'required',
            'message' => 'required',
            'address' => 'required',
        ];
    }
}
