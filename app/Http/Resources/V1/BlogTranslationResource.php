<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="BlogTranslationResource",
 *     @OA\Xml(
 *         name="BlogTranslationResource",
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BlogTranslation/properties/id",
 *     ),
 *     @OA\Property (
 *         property="blogId",
 *         ref="#/components/schemas/BlogTranslation/properties/blog_id",
 *     ),
 *     @OA\Property (
 *         property="locale",
 *         ref="#/components/schemas/BlogTranslation/properties/locale",
 *     ),
 *     @OA\Property (
 *         property="title",
 *         ref="#/components/schemas/BlogTranslation/properties/title",
 *     ),
 *     @OA\Property (
 *         property="content",
 *         ref="#/components/schemas/BlogTranslation/properties/content",
 *     ),
 * )
 */
class BlogTranslationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'blogId' => $this->blog_id,
            'locale' => $this->locale,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
