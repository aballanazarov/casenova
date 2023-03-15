<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title="GalleryCollection",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items (
 *             ref="#/components/schemas/GalleryResource",
 *         ),
 *     )
 * )
 */
class GalleryCollection extends ResourceCollection
{
    public function toArray($request) : array
    {
        return parent::toArray($request);
    }
}
