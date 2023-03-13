<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * @OA\Schema(
 *     title="StoreServiceTranslationRequest",
 *     @OA\Xml(
 *         name="StoreServiceTranslationRequest"
 *     ),
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/ServiceTranslation/properties/name",
 *     ),
 *     @OA\Property (
 *         property="title",
 *         ref="#/components/schemas/ServiceTranslation/properties/title",
 *     ),
 * ),
 *
 * @property string title
 * @property string content
 */
class StoreServiceTranslationRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return !is_null($user) && $user->tokenCan('create');
    }


    public function rules()
    {
        return [
            'name' => ['required'],
            'title' => ['required'],
        ];
    }


    protected function prepareForValidation()
    {
        //
    }
}
