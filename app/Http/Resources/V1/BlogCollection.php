<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema(
 *     title="BlogCollection",
 *     description="Blog Collection",
 *     @OA\Xml(
 *         name="BlogCollection"
 *     )
 * )
 */
class BlogCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
