<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="StoreBlogRequest",
 *      description="Store Blog request body data",
 *      type="object",
 *      @OA\Xml (
 *          name = "StoreBlogRequest",
 *      )
 * )
 */
class StoreBlogRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return !is_null($user) && $user->tokenCan('create');
    }


    public function rules()
    {
        $result = [];

        foreach (config('translatable.locales') as $locale) {
            $result[$locale] = ['required'];
        }

        return $result;
    }


    protected function prepareForValidation()
    {
        //
    }
}
