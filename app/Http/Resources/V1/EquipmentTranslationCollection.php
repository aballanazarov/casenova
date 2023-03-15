<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title = "EquipmentTranslationCollection",
 *
 *     @OA\Property (
 *         property = "data",
 *         title  =  "Data",
 *         type = "array",
 *         @OA\Items (
 *             ref = "#/components/schemas/EquipmentTranslationResource",
 *         ),
 *     )
 * )
 */

class EquipmentTranslationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
