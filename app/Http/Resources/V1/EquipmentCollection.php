<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title = "EquipmentCollection",
 *
 *     @OA\Property (
 *         property = "data",
 *         title = "Data",
 *         type = "array",
 *         @OA\Items (
 *             ref = "#/components/schemas/EquipmentResource",
 *         ),
 *     )
 * )
 */

class EquipmentCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
