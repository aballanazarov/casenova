<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubserviceTranslationRequest extends FormRequest
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
            'content' => ['required'],
        ];
    }


    protected function prepareForValidation()
    {
        //
    }
}
