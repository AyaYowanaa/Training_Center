<?php

namespace App\Http\Requests\training_center\Exams;

use DB;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required',
            'course_id' => 'required',
            'duration' => 'required',
           'full_mark' => 'required|numeric',
            'pass_mark' => 'required|numeric',
            'date' => 'required',
        
        ];
    }

}
