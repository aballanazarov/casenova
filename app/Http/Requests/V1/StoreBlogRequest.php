<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
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