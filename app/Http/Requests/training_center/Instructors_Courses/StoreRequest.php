<?php

namespace App\Http\Requests\training_center\Instructors_Courses;

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
        
          /*  'courses_id' => 'required|exists:courses,id',
            'trainer_id' => 'required|exists:trainers,id',  */
            'courses_id' => 'required',
            'trainer_id' => 'required',
        
        ];
    }

}
