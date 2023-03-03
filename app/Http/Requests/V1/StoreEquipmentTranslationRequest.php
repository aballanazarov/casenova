<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipmentTranslationRequest extends FormRequest
{
    public function authorize()
    {
        $user = $this->user();
        return $user !== null && $user->tokenCan('create');
    }


    public function rules()
    {
        return [
            'name' => ['required'],
            'title' => ['required'],
        ];
    }


    protected function prepareForValidation()
    {
        //
    }
}
