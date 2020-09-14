<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CheckoutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check()){
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'province' => ['required', 'string', 'min:10'],
            'city' => ['required', 'string', 'min:10'],
            'postcode' => ['required', 'numeric', 'min:5'],
            'address' => ['required', 'string']
        ];
    }
}
