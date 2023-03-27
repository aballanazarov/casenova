<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema (
 *     title = "GalleryResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/Gallery/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "image",
 *         ref = "#/components/schemas/Gallery/properties/image",
 *     ),
 *
 *     @OA\Property (
 *         property = "createdAt",
 *         ref = "#/components/schemas/Gallery/properties/created_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "updatedAt",
 *         ref = "#/components/schemas/Gallery/properties/updated_at",
 *     ),
 * ),
 *
 * @property int id
 * @property string image
 * @property string created_at
 * @property string updated_at
 */
class GalleryResource extends JsonResource
{
    public function toArray($request) : array
    {
        return [
            'id' => $this->id,
            'image' => empty($this->image) ? $this->image : URL::to("/storage") . "/" . str_replace('\\', '/', $this->image),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
