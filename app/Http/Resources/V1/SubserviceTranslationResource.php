<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema (
 *     title = "SubserviceTranslationResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/SubserviceTranslation/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "subserviceId",
 *         ref = "#/components/schemas/SubserviceTranslation/properties/subservice_id",
 *     ),
 *
 *     @OA\Property (
 *         property = "locale",
 *         ref = "#/components/schemas/SubserviceTranslation/properties/locale",
 *     ),
 *
 *     @OA\Property (
 *         property = "name",
 *         ref = "#/components/schemas/SubserviceTranslation/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property = "content",
 *         ref = "#/components/schemas/SubserviceTranslation/properties/content",
 *     ),
 * )
 */
class SubserviceTranslationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'subserviceId' => $this->subservice_id,
            'locale' => $this->locale,
            'name' => $this->name,
            'content' => $this->content,
        ];
    }
}
