<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubserviceRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return $user !== null && $user->tokenCan('update');
    }


    public function rules()
    {
        $method = $this->method();
        $result = [
            //'serviceId' => ['required'],
        ];
        $locales = config('translatable.locales');

        if ($method == "PUT") {
            foreach ($locales as $locale) {
                $result[$locale] = ['required'];
            }
        } else {
            foreach ($locales as $locale) {
                $result[$locale] = ['sometimes', 'required'];
            }
        }

        return $result;
    }


    protected function prepareForValidation()
    {
        //$this->merge([
        //    'service_id' => $this->serviceId,
        //]);
    }
}
