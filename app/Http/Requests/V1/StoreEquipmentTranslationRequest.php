<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="StoreEquipmentTranslationRequest",
 *     @OA\Xml(
 *         name="StoreEquipmentTranslationRequest"
 *     ),
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/EquipmentTranslation/properties/name",
 *     ),
 *     @OA\Property (
 *         property="title",
 *         ref="#/components/schemas/EquipmentTranslation/properties/title",
 *     ),
 * ),
 *
 * @property string title
 * @property string content
 */
class StoreEquipmentTranslationRequest extends FormRequest
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
