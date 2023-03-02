<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreServiceTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }


    public function rules()
    {
        return [
            'service_id' => ['required'],
            'locale' => ['required', Rule::in(config('translatable.locales'))],
            'name' => ['required'],
            'title' => ['required'],
        ];
    }


    protected function prepareForValidation()
    {

    }
}
