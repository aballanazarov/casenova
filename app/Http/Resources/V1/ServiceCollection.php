<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title = "ServiceCollection",
 *
 *     @OA\Property (
 *         property = "data",
 *         title = "Data",
 *         type = "array",
 *         @OA\Items (
 *             ref = "#/components/schemas/ServiceResource",
 *         ),
 *     )
 * )
 */
class ServiceCollection extends ResourceCollection
{
    public function toArray($request) : array
    {
        return parent::toArray($request);
    }
}
