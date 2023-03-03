<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogTranslationRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return $user !== null && $user->tokenCan('create');
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
