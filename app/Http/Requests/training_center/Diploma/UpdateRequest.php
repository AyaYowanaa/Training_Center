<?php

namespace App\Http\Requests\training_center\Diploma;

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
             /*  'name.ar' => 'required|unique:tc_diploma,name->ar,'.$this->id,
            'name.en' => 'required|unique:tc_diploma,name->en,'.$this->id,
          'description.ar' => 'required',
            'description.en' => 'required',
            'levels' => 'required',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required', */
        ];
    }

    
}
