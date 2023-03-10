<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="BlogResource",
 *     description="Blog Resource",
 *     @OA\Xml(
 *         name="BlogResource"
 *     )
 * )
 */
class BlogResource extends JsonResource
{
    /**
     * @OA\Property(
     *     title="Data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Models\Blog[]
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => BlogTranslationResource::collection($this->translations),
        ];
    }
}
