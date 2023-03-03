<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class BulkStoreSubserviceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $result = [
            '*.serviceId' => ['required', 'integer'],
        ];

        foreach (config('translatable.locales') as $locale) {
            $result['*.' . $locale] = ['required', 'string'];
        }

        return $result;
    }


    protected function prepareForValidation()
    {
        $data = [];

        foreach ($this->toArray() as $obj) {
            $obj['service_id'] = $obj['serviceId'] ?? null;

            $data[] = $obj;
        }

        $this->merge($data);
    }
}
