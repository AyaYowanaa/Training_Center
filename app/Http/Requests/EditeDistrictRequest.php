<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditeDistrictRequest extends FormRequest
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
            'name_en' => 'required|unique:district,name->en,'.$this->id,
            'name_ar' => 'required|unique:district,name->ar,'.$this->id
        ];
    }
}
