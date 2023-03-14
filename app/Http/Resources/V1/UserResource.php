<?php

namespace App\Http\Resources\V1;

use App\Http\Requests\V1\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string name
 * @property string email
 * @property string password
 * @property string email_verified_at
 * @property string created_at
 * @property string updated_at
 */
class UserResource extends JsonResource
{
    public function toArray($request) : array
    {
        return [
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "emailVerifiedAt" => $this->email_verified_at,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
