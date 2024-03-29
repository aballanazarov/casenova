<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema(
 *     title="SubserviceResource",
 *     @OA\Xml(
 *         name="SubserviceResource"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/Subservice/properties/id",
 *     ),
 *     @OA\Property (
 *         property="image",
 *         ref="#/components/schemas/Subservice/properties/image",
 *     ),
 *     @OA\Property (
 *         property="createdAt",
 *         ref="#/components/schemas/Subservice/properties/created_at",
 *     ),
 *     @OA\Property (
 *         property="updatedAt",
 *         ref="#/components/schemas/Subservice/properties/updated_at",
 *     ),
 *     @OA\Property (
 *         property="translations",
 *         type="array",
 *         @OA\Items (
 *             anyOf={
 *                 @OA\Schema(ref="#/components/schemas/SubserviceTranslationResource"),
 *             }
 *         ),
 *     ),
 * ),
 *
 * @property int id
 * @property string service_id
 * @property string image
 * @property string created_at
 * @property string updated_at
 * @property string translations
 */

class SubserviceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'serviceId' => $this->service_id,
            'image' => empty($this->image) ? $this->image : URL::to("/uploads")  . "/" . $this->image,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => SubserviceTranslationResource::collection($this->translations),
        ];
    }
}
