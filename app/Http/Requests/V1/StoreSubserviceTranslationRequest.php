<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema (
 *     title="StoreSubserviceTranslationRequest",
 *
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/SubserviceTranslation/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property="content",
 *         ref="#/components/schemas/SubserviceTranslation/properties/content",
 *     ),
 * ),
 *
 * @property string title
 * @property string content
 */
class StoreSubserviceTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name' => ['required'],
            'content' => ['required'],
        ];
    }


    protected function prepareForValidation()
    {
        //
    }
}
