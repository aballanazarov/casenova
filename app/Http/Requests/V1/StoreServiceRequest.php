<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="StoreServiceRequest",
 *     @OA\Xml(
 *         name="StoreServiceRequest"
 *     ),
 *     @OA\Property (
 *         property="ru",
 *         type="object",
 *         ref="#/components/schemas/StoreServiceTranslationRequest",
 *     ),
 *     @OA\Property (
 *         property="uz",
 *         type="object",
 *         ref="#/components/schemas/StoreServiceTranslationRequest",
 *     ),
 *     @OA\Property (
 *         property="en",
 *         type="object",
 *         ref="#/components/schemas/StoreServiceTranslationRequest",
 *     ),
 * ),
 */

class StoreServiceRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return !is_null($user) && $user->tokenCan('create');
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
