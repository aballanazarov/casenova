<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

/**
 * @property string name
 * @property string email
 * @property string password
 */
class StoreUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required']
        ];
    }


    public function passedValidation()
    {
        $this->replace([
            'password' => Hash::make($this->password),
        ]);
    }
}
