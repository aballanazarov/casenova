<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title="SubserviceCollection",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items (
 *             ref="#/components/schemas/SubserviceResource",
 *         ),
 *     )
 * )
 */

class SubserviceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
