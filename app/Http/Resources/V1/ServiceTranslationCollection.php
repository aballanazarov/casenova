<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema (
 *     title = "ServiceTranslationCollection",
 *
 *     @OA\Property (
 *         property = "data",
 *         title = "data",
 *         type = "array",
 *         @OA\Items (
 *             ref = "#/components/schemas/ServiceTranslationResource",
 *         ),
 *     )
 * )
 */

class ServiceTranslationCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
