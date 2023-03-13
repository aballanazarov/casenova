<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title="ServiceCollection",
 *     @OA\Property(
 *         property="data",
 *         type="array",
 *         @OA\Items (
 *             ref="#/components/schemas/ServiceResource",
 *         ),
 *     )
 * )
 */

class ServiceCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
