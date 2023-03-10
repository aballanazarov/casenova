<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="UpdateBlogRequest",
 *      description="Update Blog request body data",
 *      type="object",
 *      @OA\Xml (
 *          name = "UpdateBlogRequest",
 *      )
 * )
 */
class UpdateBlogRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return !is_null($user) && $user->can('update');
    }


    public function rules()
    {
        $result = [];
        $locales = config('translatable.locales');

        if ($this->method() === "PUT") {
            foreach ($locales as $locale) {
                $result[$locale] = ['required'];
            }
        } else {
            foreach ($locales as $locale) {
                $result[$locale] = ['sometimes', 'required'];
            }
        }

        return $result;
    }
}
