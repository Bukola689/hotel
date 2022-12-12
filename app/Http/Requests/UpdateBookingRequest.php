<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
            // 'name' => 'required',
            // 'room_type_id' => 'required',
            // 'total_number' => 'required',
            // 'email' => 'required',
            // 'phone_number' => 'required',
            // 'status' => 'required',
            // 'image' => 'required',
            // 'message' => 'required'
        ];
    }
}
