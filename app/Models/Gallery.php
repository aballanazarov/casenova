<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="Blog",
 *     @OA\Xml(
 *         name="Blog"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseModel/properties/id",
 *     ),
 *     @OA\Property (
 *         property="image",
 *         ref="#/components/schemas/BaseModel/properties/image",
 *     ),
 *     @OA\Property (
 *         property="created_at",
 *         ref="#/components/schemas/BaseModel/properties/created_at",
 *     ),
 *     @OA\Property (
 *         property="updated_at",
 *         ref="#/components/schemas/BaseModel/properties/updated_at",
 *     ),
 * ),
 *
 * @property int id
 * @property string image
 * @property string create_at
 * @property string update_at
 */
class Gallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
    ];
}
