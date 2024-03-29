<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreSubserviceTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            '*.name' => ['required', 'string'],
            '*.content' => ['required', 'string'],
        ];
    }


    protected function prepareForValidation()
    {
        //
    }
}
