<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return $user !== null && $user->tokenCan('create');
    }


    public function rules()
    {
        $result = [];

        foreach (config('translatable.locales') as $locale) {
            $result[$locale] = ['required'];
        }

        return $result;
    }


    protected function prepareForValidation()
    {
        //
    }
}
