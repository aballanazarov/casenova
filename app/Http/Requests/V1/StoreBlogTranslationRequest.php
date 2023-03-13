<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="StoreBlogTranslationRequest",
 *     @OA\Xml(
 *         name="StoreBlogTranslationRequest"
 *     ),
 *     @OA\Property (
 *         property="title",
 *         ref="#/components/schemas/BlogTranslation/properties/title",
 *     ),
 *     @OA\Property (
 *         property="content",
 *         ref="#/components/schemas/BlogTranslation/properties/content",
 *     ),
 * ),
 *
 * @property string title
 * @property string content
 */
class StoreBlogTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'title' => ['required'],
            'content' => ['required'],
        ];
    }


    protected function prepareForValidation()
    {
        //
    }
}
