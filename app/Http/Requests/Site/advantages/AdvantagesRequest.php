<?php

namespace App\Http\Requests\Site\advantages;

use Illuminate\Foundation\Http\FormRequest;

class AdvantagesRequest extends FormRequest
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

            'title_ar' => 'required|unique:site_advantages,title->ar,'.$this->id,
            'title_en' => 'required|unique:site_advantages,title->en,'.$this->id,
            'description_ar' => 'required',
            'description_en' => 'required',
            'icon' => 'required',
        ];
    }
}
