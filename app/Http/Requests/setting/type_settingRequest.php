<?php

namespace App\Http\Requests\setting;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class type_settingRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|unique:tc_type_setting,title->ar',
            'name_en' => 'required|unique:tc_type_setting,title->en',
            'code' => 'required|unique:tc_type_setting,code',
        ];
    }
}
