<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * @OA\Schema (
 *     title = "Blog",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *
 *     @OA\Property (
 *         property = "title",
 *         title = "Title",
 *         type = "string",
 *     ),
 *
 *     @OA\Property (
 *         property = "content",
 *         title = "Content",
 *         type = "string",
 *     ),
 *
 *     @OA\Property (
 *         property = "image",
 *         ref = "#/components/schemas/BaseProperties/properties/property_image",
 *     ),
 *
 *     @OA\Property (
 *         property = "created_at",
 *         title = "Created at",
 *         ref = "#/components/schemas/BaseProperties/properties/property_time",
 *     ),
 *
 *     @OA\Property (
 *         property = "updated_at",
 *         title = "Updated at",
 *         ref = "#/components/schemas/BaseProperties/properties/property_time",
 *     ),
 * ),
 *
 * @property int id
 * @property string title
 * @property string content
 * @property string image
 * @property string create_at
 * @property string update_at
 * @property array translatedAttributes
 */
class Blog extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    public $translatable = [
        'title',
        'content',
    ];
}
