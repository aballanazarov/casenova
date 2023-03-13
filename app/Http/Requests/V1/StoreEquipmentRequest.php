<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="StoreEquipmentRequest",
 *     @OA\Xml(
 *         name="StoreEquipmentRequest"
 *     ),
 *     @OA\Property (
 *         property="ru",
 *         type="object",
 *         ref="#/components/schemas/StoreEquipmentTranslationRequest",
 *     ),
 *     @OA\Property (
 *         property="uz",
 *         type="object",
 *         ref="#/components/schemas/StoreEquipmentTranslationRequest",
 *     ),
 *     @OA\Property (
 *         property="en",
 *         type="object",
 *         ref="#/components/schemas/StoreEquipmentTranslationRequest",
 *     ),
 * ),
 */

class StoreEquipmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
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
