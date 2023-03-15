<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="UpdateSubserviceRequest",
 *
 *     @OA\Property (
 *         property="ru",
 *         type="object",
 *         ref="#/components/schemas/UpdateSubserviceTranslationRequest",
 *     ),
 *
 *     @OA\Property (
 *         property="uz",
 *         type="object",
 *         ref="#/components/schemas/UpdateSubserviceTranslationRequest",
 *     ),
 *
 *     @OA\Property (
 *         property="en",
 *         type="object",
 *         ref="#/components/schemas/UpdateSubserviceTranslationRequest",
 *     ),
 * ),
 */

class UpdateSubserviceRequest extends FormRequest
{
    public function authorize()
    {
        return true;
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
