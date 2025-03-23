<?php

namespace App\Http\Requests\Site\statistics;

use Illuminate\Foundation\Http\FormRequest;

class StatisticsRequest extends FormRequest
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

            'title_ar' => 'required|unique:site_statistics,title->ar,'.$this->id,
            'title_en' => 'required|unique:site_statistics,title->en,'.$this->id,
            'number' => 'required',
        ];
    }
}
