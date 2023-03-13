<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @OA\Schema(
 *     title="StoreSubserviceRequest",
 *     @OA\Xml(
 *         name="StoreSubserviceRequest"
 *     ),
 *     @OA\Property (
 *         property="ru",
 *         type="object",
 *         ref="#/components/schemas/StoreSubserviceTranslationRequest",
 *     ),
 *     @OA\Property (
 *         property="uz",
 *         type="object",
 *         ref="#/components/schemas/StoreSubserviceTranslationRequest",
 *     ),
 *     @OA\Property (
 *         property="en",
 *         type="object",
 *         ref="#/components/schemas/StoreSubserviceTranslationRequest",
 *     ),
 * ),
 */

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
