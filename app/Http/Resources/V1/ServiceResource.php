<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title="ServiceResource",
 *     @OA\Xml(
 *         name="ServiceResource"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/Service/properties/id",
 *     ),
 *     @OA\Property (
 *         property="createdAt",
 *         ref="#/components/schemas/Service/properties/created_at",
 *     ),
 *     @OA\Property (
 *         property="updatedAt",
 *         ref="#/components/schemas/Service/properties/updated_at",
 *     ),
 *     @OA\Property (
 *         property="translations",
 *         type="array",
 *         @OA\Items (
 *             anyOf={
 *                 @OA\Schema(ref="#/components/schemas/ServiceTranslationResource"),
 *             }
 *         ),
 *     ),
 * ),
 *
 * @property int id
 * @property string created_at
 * @property string updated_at
 * @property string translations
 */
class ServiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => ServiceTranslationResource::collection($this->translations),
            'subservices' => SubserviceResource::collection($this->whenLoaded('subservices')),
        ];
    }
}
