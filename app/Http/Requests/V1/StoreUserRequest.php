<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Schema (
 *     title="StoreServiceRequest",
 *
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/User/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property="email",
 *         ref="#/components/schemas/User/properties/email",
 *     ),
 *
 *     @OA\Property (
 *         property="password",
 *         ref="#/components/schemas/User/properties/password",
 *     ),
 * ),
 *
 *
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
