<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="UpdateServiceTranslationRequest",
 *
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/ServiceTranslation/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property="title",
 *         ref="#/components/schemas/ServiceTranslation/properties/title",
 *     ),
 * ),
 *
 * @property string name
 * @property string title
 */
class UpdateServiceTranslationRequest extends FormRequest
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
