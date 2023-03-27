<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

/**
 * @OA\Schema (
 *     title = "Subservice",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *
 *     @OA\Property (
 *         property = "service_id",
 *         title = "Service ID",
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
 * @property int service_id
 * @property string name
 * @property string content
 * @property string image
 * @property string create_at
 * @property string update_at
 * @property array translatedAttributes
 */
class Subservice extends Model
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'service_id',
        'name',
        'content',
        'image',
    ];

    public $translatable = [
        'name',
        'content',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
