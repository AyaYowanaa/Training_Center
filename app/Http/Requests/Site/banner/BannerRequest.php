<?php

namespace App\Http\Requests\Site\banner;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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

            'title_ar' => 'required|unique:site_banners,title->ar,'.$this->id,
            'title_en' => 'required|unique:site_banners,title->en,'.$this->id,
            'sub_title_ar' => 'required|unique:site_banners,sub_title->ar,'.$this->id,
            'sub_title_en' => 'required|unique:site_banners,sub_title->en,'.$this->id,
            'image' => ($this->id ? 'sometimes' : 'required') . '|mimes:jpg,jpeg,png',

        ];
    }
}
