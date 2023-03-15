<?php

namespace App\Http\Resources\V1;

use App\Http\Requests\V1\LoginUserRequest;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="UserResource",
 *     @OA\Xml(
 *         name="UserResource"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/User/properties/id",
 *     ),
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/User/properties/name",
 *     ),
 *     @OA\Property (
 *         property="email",
 *         ref="#/components/schemas/User/properties/email",
 *     ),
 *     @OA\Property (
 *         property="password",
 *         ref="#/components/schemas/User/properties/password",
 *     ),
 *     @OA\Property (
 *         property="emailVerifiedAt",
 *         ref="#/components/schemas/User/properties/email_verified_at",
 *     ),
 *     @OA\Property (
 *         property="createdAt",
 *         ref="#/components/schemas/User/properties/created_at",
 *     ),
 *     @OA\Property (
 *         property="updatedAt",
 *         ref="#/components/schemas/User/properties/updated_at",
 *     ),
 * ),
 *
 * @property int id
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
            "id" => $this->id,
            "name" => $this->name,
            "email" => $this->email,
            "password" => $this->password,
            "emailVerifiedAt" => $this->email_verified_at,
            "createdAt" => $this->created_at,
            "updatedAt" => $this->updated_at,
        ];
    }
}
