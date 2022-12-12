<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
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
            'ac_no_ac' => 'required',
            'room_type_id' => 'required',
            'charges_for_cancellation' => 'required',
            'food' => 'required',
            'bed_count' => 'required',
            'phone_number' => 'required',
            'rent' => 'required',
            'file_upload' => 'required',
            'message' => 'required',
        ];
    }
}
