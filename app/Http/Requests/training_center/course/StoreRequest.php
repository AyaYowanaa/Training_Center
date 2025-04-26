<?php

namespace App\Http\Requests\training_center\course;

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
            'name.ar' => 'required|unique:tc_courses,name->ar',
            'name.en' => 'required|unique:tc_courses,name->en',
//            'course_num' => 'required|numeric|min:0|unique:tc_courses,course_num',
            'code' => 'required|numeric|min:0|unique:tc_courses,code',
            'course_type' => ['required', 'in:general,program,main'],
            'parent_id' => [
                'nullable',
                'integer',
                'min:0',
                function ($attribute, $value, $fail) {
                    // إذا كانت قيمة `parent_id` ليست صفرًا، تحقق من وجودها في جدول `tc_courses`
                    if ($value != 0 && !DB::table('tc_courses')->where('id', $value)->exists()) {
                        $fail(trans('forms.course_not_exite'));
                    }
                },
            ],
        ];
    }

    /*  public function rules(): array
    {
        return [
            'name.ar' => 'required|unique:tc_courses,name->ar',
            'name.en' => 'required|unique:tc_courses,name->en',
            'course_num' => 'required|numeric|min:0|unique:tc_courses,course_num',
            'code' => 'required|numeric|min:0|unique:tc_courses,code',
            'parent_id' => 'nullable|exists:tc_courses,id',

        ];
    }*/
}
