<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreSubserviceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $result = [

        ];

        foreach (config('translatable.locales') as $locale) {
            $result[$locale] = ['required'];
        }

        return $result;
    }


    protected function prepareForValidation()
    {
        $this->merge([
            'service_id' => $this->serviceId,
        ]);
    }
}
