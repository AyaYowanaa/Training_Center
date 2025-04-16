<?php

namespace App\Http\Requests\training_center\Students;

use DB;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name_en' => 'required|unique:students,name->en,'.$this->id,
            'name_ar' => 'required|unique:students,name->ar,'.$this->id,
            'phone' => 'required|numeric',
            'email' => 'required|email|unique:students,email,'.$this->id,
        
        ];
    }

}
