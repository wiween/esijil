<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'email' => 'required|email',
            'ic_number' => 'required|size:12',
            'status' => 'required',
            'role' => 'required',
            'phone' => 'min:10|max:12',
            'avatar' => 'required|file|mimes:jpeg,jpg,png'
        ];
    }
}
