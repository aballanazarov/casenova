<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="SubserviceTranslation",
 *     @OA\Xml(
 *         name="SubserviceTranslation"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="subservice_id",
 *         ref="#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="locale",
 *         ref="#/components/schemas/BaseProperties/properties/property_locale",
 *     ),
 *     @OA\Property (
 *         property="name",
 *         title="name",
 *         format="string",
 *         type="string",
 *     ),
 *     @OA\Property (
 *         property="content",
 *         title="content",
 *         format="string",
 *         type="string",
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
