<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubserviceTranslationRequest extends FormRequest
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