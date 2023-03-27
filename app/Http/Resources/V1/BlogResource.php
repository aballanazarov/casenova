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
 *         property = "title",
 *         ref = "#/components/schemas/Blog/properties/title",
 *     ),
 *
 *     @OA\Property (
 *         property = "content",
 *         ref = "#/components/schemas/Blog/properties/content",
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
 * ),
 *
 * @property int id
 * @property string title
 * @property string content
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
            'title' => $this->title,
            'content' => $this->content,
            'image' => empty($this->image) ? $this->image : URL::to("/storage") . "/" . str_replace('\\', '/', $this->image),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
