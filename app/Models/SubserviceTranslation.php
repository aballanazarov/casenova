<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title = "SubserviceTranslation",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *
 *     @OA\Property (
 *         property = "subservice_id",
 *         ref = "#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *
 *     @OA\Property (
 *         property = "locale",
 *         ref = "#/components/schemas/BaseProperties/properties/property_locale",
 *     ),
 *
 *     @OA\Property (
 *         property = "name",
 *         title = "Name",
 *         type = "string",
 *     ),
 *
 *     @OA\Property (
 *         property = "content",
 *         title = "Content",
 *         type = "string",
 *     ),
 * ),
 *
 * @property int id
 * @property int blog_id
 * @property string locale
 * @property string name
 * @property string content
 */
class SubserviceTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'content',
    ];
}
