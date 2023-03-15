<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="BlogTranslation",
 *     @OA\Xml(
 *         name="BlogTranslation"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseModel/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="blog_id",
 *         title="blog_id",
 *         ref="#/components/schemas/BaseModel/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="locale",
 *         ref="#/components/schemas/BaseModel/properties/property_locale",
 *     ),
 *     @OA\Property (
 *         property="title",
 *         title="title",
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
 * @property string title
 * @property string content
 */
class BlogTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'content',
    ];
}
