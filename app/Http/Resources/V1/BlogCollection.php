<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title="BlogCollection",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items (
 *             ref="#/components/schemas/BlogResource",
 *         ),
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
