<?php

namespace App\Http\Requests\training_center\training_courses;

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
            'title.ar' => 'required|unique:tc_courses,title->ar'.$this->id,
            'title.en' => 'required|unique:tc_courses,title->en'.$this->id,

        
        ];
    }

    
}
