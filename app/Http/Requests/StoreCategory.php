<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::guard('admin')->check()) {
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
            'category_name' => ['required', 'string', 'unique:categories']
        ];
    }

    public function messages()
    {
        if (request()->isMethod('PUT')) {
            return [
                'category_name.unique' => 'Nothing different'
            ];
        }

        return [];
    }
}
