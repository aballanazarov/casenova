<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema (
 *     title = "BlogResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/Blog/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "image",
 *         ref = "#/components/schemas/Blog/properties/image",
 *     ),
 *
 *     @OA\Property (
 *         property = "createdAt",
 *         ref = "#/components/schemas/Blog/properties/created_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "updatedAt",
 *         ref = "#/components/schemas/Blog/properties/updated_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "translations",
 *         title = "Translations",
 *         type = "array",
 *         @OA\Items (
 *             ref = "#/components/schemas/BlogTranslationResource"
 *         ),
 *     ),
 * ),
 *
 * @property int id
 * @property string image
 * @property string created_at
 * @property string updated_at
 * @property string translations
 */
class BlogResource extends JsonResource
{
    /**
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => empty($this->image) ? $this->image : URL::to("/uploads")  . "/" . $this->image,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => BlogTranslationResource::collection($this->translations),
        ];
    }
}
