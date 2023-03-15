<?php

namespace App\Http\Requests\V1;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * @OA\Schema (
 *     title = "LoginUserRequest",
 *
 *     @OA\Property (
 *         property = "email",
 *         ref = "#/components/schemas/User/properties/email",
 *     ),
 *
 *     @OA\Property (
 *         property = "password",
 *         ref = "#/components/schemas/User/properties/password",
 *     ),
 * ),
 *
 * @property string email
 * @property string password
 */
class LoginUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required']
        ];
    }
}
