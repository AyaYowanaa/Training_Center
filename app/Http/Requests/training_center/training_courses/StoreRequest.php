<?php

namespace App\Http\Requests\training_center\training_courses;

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
            'title_ar' => 'required|unique:training_courses,title->ar',
            'title_en' => 'required|unique:training_courses,title->en',
            'courses_id' => 'required|exists:tc_courses,id',
            'capacity'=>'required|numeric|min:1',
            'fee'=>'required|numeric|min:1',
            'location_id'=>'required|exists:locations,id',

        ];
    }

}
