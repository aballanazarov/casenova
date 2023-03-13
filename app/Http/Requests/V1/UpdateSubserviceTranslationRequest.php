<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="UpdateSubserviceTranslationRequest",
 *     @OA\Xml(
 *         name="UpdateSubserviceTranslationRequest"
 *     ),
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/SubserviceTranslation/properties/name",
 *     ),
 *     @OA\Property (
 *         property="content",
 *         ref="#/components/schemas/SubserviceTranslation/properties/content",
 *     ),
 * ),
 *
 * @property string name
 * @property string content
 */
class UpdateSubserviceTranslationRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return !is_null($user) && $user->tokenCan('update');
    }


    public function rules()
    {
        $method = $this->method();

        if ($method == "PUT") {
            return [
                'name' => ['required'],
                'content' => ['required'],
            ];
        } else {
            return [
                'name' => ['sometimes', 'required'],
                'content' => ['sometimes', 'required'],
            ];
        }
    }


    protected function prepareForValidation()
    {
        //
    }
}
