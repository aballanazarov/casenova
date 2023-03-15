<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema (
 *     title="UpdateBlogRequest",
 *
 *     @OA\Property (
 *         property="ru",
 *         type="object",
 *         ref="#/components/schemas/UpdateBlogTranslationRequest",
 *     ),
 *
 *     @OA\Property (
 *         property="uz",
 *         type="object",
 *         ref="#/components/schemas/UpdateBlogTranslationRequest",
 *     ),
 *
 *     @OA\Property (
 *         property="en",
 *         type="object",
 *         ref="#/components/schemas/UpdateBlogTranslationRequest",
 *     ),
 * ),
 */
class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $result = [];
        $locales = config('translatable.locales');

        if ($this->method() === "PUT") {
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
}
