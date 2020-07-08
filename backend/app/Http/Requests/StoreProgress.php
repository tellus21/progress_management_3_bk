<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProgress extends FormRequest
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
            'reception_time' => 'required|date|' ,
            'reception_person' => 'required|string|max:50' ,
            'name' => 'required|string|max:50' ,
            'gender' => 'required' ,
            'company' => 'required|string|max:100' ,
            'doctor_check' => 'required' ,
            'nurse_check' => 'required' ,
        ];
    }
}
