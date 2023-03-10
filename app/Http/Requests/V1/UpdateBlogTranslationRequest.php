<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateBlogTranslationRequest",
 *      description="Update Blog Translation request body data",
 *      type="object",
 *      @OA\Xml (
 *          name = "UpdateBlogTranslationRequest",
 *      )
 * )
 */
class UpdateBlogTranslationRequest extends FormRequest
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
