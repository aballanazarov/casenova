<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdateServiceTranslationRequest extends FormRequest
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
