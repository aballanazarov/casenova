<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreBlogTranslationRequest",
 *      description="Store Blog Translation request body data",
 *      type="object",
 *      @OA\Xml (
 *          name = "StoreBlogTranslationRequest",
 *      )
 * )
 */
class StoreBlogTranslationRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return !is_null($user) && $user->tokenCan('create');
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
