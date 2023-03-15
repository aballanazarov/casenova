<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title = "SubserviceTranslationCollection",
 *
 *     @OA\Property(
 *         property = "data",
 *         title = "Data",
 *         type = "array",
 *         @OA\Items (
 *             ref = "#/components/schemas/SubserviceTranslationResource",
 *         ),
 *     )
 * )
 */

class SubserviceTranslationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
