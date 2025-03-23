<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditeCityRequest extends FormRequest
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
            'city_name_en' => 'required|unique:city,city_name->en,'.$this->id,
            'city_name_ar' => 'required|unique:city,city_name->ar,'.$this->id
        ];
    }
}
