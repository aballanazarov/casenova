<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema (
 *     title="UpdateEquipmentTranslationRequest",
 *
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/EquipmentTranslation/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property="title",
 *         ref="#/components/schemas/EquipmentTranslation/properties/title",
 *     ),
 * ),
 *
 * @property string name
 * @property string title
 */
class UpdateEquipmentTranslationRequest extends FormRequest
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
                'name' => ['required'],
                'title' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'title' => ['sometimes', 'required'],
            ];
        }
    }


    protected function prepareForValidation()
    {
        //
    }
}
