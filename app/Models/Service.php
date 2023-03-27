<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * @OA\Schema (
 *     title = "Service",
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
 *         property = "title",
 *         title = "Title",
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
 * @property string name
 * @property string title
 * @property string image
 * @property string create_at
 * @property string update_at
 * @property array translatedAttributes
 */
class Service extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'name',
        'title',
        'image',
    ];

    public $translatable = [
        'name',
        'title',
    ];


    public function subservices()
    {
        return $this->hasMany(Subservice::class);
    }
}
