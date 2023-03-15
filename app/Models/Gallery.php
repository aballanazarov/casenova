<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
 * @OA\Schema (
 *     title="Gallery",
 *     @OA\Xml(
 *         name="Gallery"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseProperties/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="image",
 *         ref="#/components/schemas/BaseProperties/properties/property_image",
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


    public function uploadImage(Request $request) : bool
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
