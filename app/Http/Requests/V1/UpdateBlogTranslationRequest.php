<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="UpdateBlogTranslationRequest",
 *     @OA\Xml(
 *         name="UpdateBlogTranslationRequest"
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
class UpdateBlogTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        $method = $this->method();

        if ($method == "PUT") {
            return [
                'title' => ['required'],
                'content' => ['required'],
            ];
        } else {
            return [
                'title' => ['sometimes', 'required'],
                'content' => ['sometimes', 'required'],
            ];
        }
    }


    protected function prepareForValidation()
    {
        //
    }
}
