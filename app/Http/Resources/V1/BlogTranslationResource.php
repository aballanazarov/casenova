<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="BlogTranslationResource",
 *     description="Blog Translation Resource",
 *     @OA\Xml(
 *         name="BlogTranslationResource",
 *     ),
 *     @OA\Property (
 *         property="title",
 *         title="title",
 *         description="title",
 *         format="string",
 *     ),
 *     @OA\Property (
 *         property="content",
 *         title="content",
 *         description="content",
 *         format="string",
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
