<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema (
 *     title = "Users",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *
 *     @OA\Property (
 *         property = "name",
 *         title = "Name",
 *         type = "string",
 *     ),
 *
 *     @OA\Property (
 *         property = "email",
 *         title = "Email",
 *         format = "email",
 *         type = "string",
 *     ),
 *
 *     @OA\Property (
 *         property = "password",
 *         title = "Password",
 *         format = "password",
 *         type = "string",
 *     ),
 *
 *     @OA\Property (
 *         property = "email_verified_at",
 *         ref = "#/components/schemas/BaseProperties/properties/property_time",
 *     ),
 *
 *     @OA\Property (
 *         property = "created_at",
 *         ref = "#/components/schemas/BaseProperties/properties/property_time",
 *     ),
 *
 *     @OA\Property (
 *         property = "updated_at",
 *         ref = "#/components/schemas/BaseProperties/properties/property_time",
 *     ),
 * ),
 *
 *
 * @property int id
 * @property string name
 * @property string email
 * @property string password
 * @property string email_verified_at
 * @property string created_at
 * @property string updated_at
 */
class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
