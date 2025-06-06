<?php

namespace App\Http\Requests\training_center\course;

use DB;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
    public function rules(): array
    {
        $id = $this->id;
      // $this->dd($id);
        return [
            'name.ar' => [
                'required',
                Rule::unique('tc_courses', 'name->ar')->ignore($id),
            ],
            'name.en' => [
                'required',
                Rule::unique('tc_courses', 'name->en')->ignore($id),
            ],

            'code' => [
                'required',
                'numeric',
                'min:0',
                Rule::unique('tc_courses')->ignore($id),
            ],
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
}
