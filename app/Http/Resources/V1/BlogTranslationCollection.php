<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema(
 *     title="BlogTranslationCollection",
 *     description="Blog Translation Collection",
 *     @OA\Xml(
 *         name="BlogTranslationCollection"
 *     )
 * )
 */

class BlogTranslationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
