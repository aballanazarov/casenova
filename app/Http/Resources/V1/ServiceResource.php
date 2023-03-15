<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema (
 *     title = "ServiceResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/Service/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "image",
 *         ref = "#/components/schemas/Service/properties/image",
 *     ),
 *
 *     @OA\Property (
 *         property = "createdAt",
 *         ref = "#/components/schemas/Service/properties/created_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "updatedAt",
 *         ref = "#/components/schemas/Service/properties/updated_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "translations",
 *         title = "Translations",
 *         type = "array",
 *         @OA\Items (
 *             ref = "#/components/schemas/ServiceTranslationResource"
 *         ),
 *     ),
 * ),
 *
 * @property int id
 * @property string image
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
            'image' => empty($this->image) ? $this->image : URL::to("/uploads")  . "/" . $this->image,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => ServiceTranslationResource::collection($this->translations),
            'subservices' => SubserviceResource::collection($this->whenLoaded('subservices')),
        ];
    }
}
