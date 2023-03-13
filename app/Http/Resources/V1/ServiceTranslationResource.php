<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ServiceTranslationResource",
 *     @OA\Xml(
 *         name="ServiceTranslationResource",
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/ServiceTranslation/properties/id",
 *     ),
 *     @OA\Property (
 *         property="serviceId",
 *         ref="#/components/schemas/ServiceTranslation/properties/service_id",
 *     ),
 *     @OA\Property (
 *         property="locale",
 *         ref="#/components/schemas/ServiceTranslation/properties/locale",
 *     ),
 *     @OA\Property (
 *         property="name",
 *         ref="#/components/schemas/ServiceTranslation/properties/name",
 *     ),
 *     @OA\Property (
 *         property="title",
 *         ref="#/components/schemas/ServiceTranslation/properties/title",
 *     ),
 * )
 */
class ServiceTranslationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'serviceId' => $this->service_id,
            'locale' => $this->locale,
            'name' => $this->name,
            'title' => $this->title,
        ];
    }
}
