<?php

namespace App\Http\Requests\Site\feedback;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name_ar' => 'required|unique:site_feedbacks,name->ar,'.$this->id,
            'name_en' => 'required|unique:site_feedbacks,name->en,'.$this->id,
            'feedback_ar' => 'required',
            'feedback_en' => 'required',
            'jop_title_ar' => 'required',
            'jop_title_en' => 'required',
            // 'image' => ($this->id ? 'sometimes' : 'required') . '|mimes:jpg,jpeg,png',
                        'image' => 'sometimes'  . '|mimes:jpg,jpeg,png',

        ];
    }
}
