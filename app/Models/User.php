<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;

/**
 * @OA\Schema (
 *     title="Subservice",
 *     @OA\Xml(
 *         name="Subservice"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="name",
 *         title="name",
 *         format="string",
 *         type="string",
 *     ),
 *     @OA\Property (
 *         property="email",
 *         title="email",
 *         format="email",
 *         type="string",
 *     ),
 *     @OA\Property (
 *         property="password",
 *         title="password",
 *         format="password",
 *         type="string",
 *     ),
 *     @OA\Property (
 *         property="email_verified_at",
 *         title="email_verified_at",
 *         ref="#/components/schemas/BaseProperties/properties/property_time",
 *     ),
 *     @OA\Property (
 *         property="created_at",
 *         title="created_at",
 *         ref="#/components/schemas/BaseProperties/properties/property_time",
 *     ),
 *     @OA\Property (
 *         property="updated_at",
 *         title="updated_at",
 *         ref="#/components/schemas/BaseProperties/properties/property_time",
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
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

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

    public function setPasswordAttribute(string $value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
