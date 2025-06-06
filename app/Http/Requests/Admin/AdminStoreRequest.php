<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class AdminStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_name' => 'required|unique:admins,name',
            'phone' => 'required|unique:admins,phone',
//            'roles' => 'required',
            'password' => 'required',
            'email' => 'required|email|unique:admins,email',
            'status' => 'required',
        ];
    }
}
