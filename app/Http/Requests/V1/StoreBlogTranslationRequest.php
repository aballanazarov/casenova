<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogTranslationRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }


    public function rules()
    {
        return [
            //
        ];
    }
}
