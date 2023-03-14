<?php

namespace App\Http\Resources\V1;

use App\Http\Requests\V1\LoginUserRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "email" => $this->email,
            "password" => $this->password,
        ];
    }
}
