<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBlogTranslationRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return $user !== null && $user->tokenCan('update');
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
