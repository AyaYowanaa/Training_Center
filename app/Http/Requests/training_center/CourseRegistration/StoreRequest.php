<?php

namespace App\Http\Requests\training_center\CourseRegistration;

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

            'course_id' => 'required|exists:tc_courses,id',
            'student_id' => 'required|exists:tc_students,id',
            'entity_id'=>'sometime|exists:tc_entities,id',
            'student_ids' => 'sometime|array',
            'student_ids.*' => 'exists:tc_students,id',
        ];
    }

}
