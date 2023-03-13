<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="Equipment",
 *     @OA\Xml(
 *         name="Equipment"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseModel/properties/id",
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
 * @property string create_at
 * @property string update_at
 * @property array translatedAttributes
 */
class Equipment extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = [
        'name',
        'title',
    ];
}
