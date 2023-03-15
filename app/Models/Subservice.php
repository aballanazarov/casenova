<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @OA\Schema (
 *     title="Subservice",
 *     @OA\Xml(
 *         name="Subservice"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseModel/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="service_id",
 *         title="service_id",
 *         ref="#/components/schemas/BaseModel/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="image",
 *         ref="#/components/schemas/BaseModel/properties/property_image",
 *     ),
 *     @OA\Property (
 *         property="created_at",
 *         title="created_at",
 *         ref="#/components/schemas/BaseModel/properties/property_time",
 *     ),
 *     @OA\Property (
 *         property="updated_at",
 *         title="updated_at",
 *         ref="#/components/schemas/BaseModel/properties/property_time",
 *     ),
 * ),
 *
 * @property int id
 * @property int service_id
 * @property string image
 * @property string create_at
 * @property string update_at
 * @property array translatedAttributes
 */
class Subservice extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    protected $fillable = [
        'service_id',
        'image',
    ];

    public $translatedAttributes = [
        'name',
        'content',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }


    public function uploadImage(Request $request)
    {
        $upload = $request->file('image');
        if (!is_null($upload)) {
            $uploadName = time() . "." . $upload->extension();
            $upload->move(public_path('uploads'), $uploadName);
            $this->image = $uploadName;
            return $this->save();
        }

        return false;

    }
}
