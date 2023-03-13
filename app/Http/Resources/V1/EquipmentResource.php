<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema(
 *     title="EquipmentResource",
 *     @OA\Xml(
 *         name="EquipmentResource"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/Equipment/properties/id",
 *     ),
 *     @OA\Property (
 *         property="image",
 *         ref="#/components/schemas/Equipment/properties/image",
 *     ),
 *     @OA\Property (
 *         property="createdAt",
 *         ref="#/components/schemas/Equipment/properties/created_at",
 *     ),
 *     @OA\Property (
 *         property="updatedAt",
 *         ref="#/components/schemas/Equipment/properties/updated_at",
 *     ),
 *     @OA\Property (
 *         property="translations",
 *         type="array",
 *         @OA\Items (
 *             anyOf={
 *                 @OA\Schema(ref="#/components/schemas/EquipmentTranslationResource"),
 *             }
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

class EquipmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'od' => $this->id,
            'image' => empty($this->image) ? $this->image : URL::to("/uploads")  . "/" . $this->image,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => EquipmentTranslationResource::collection($this->translations),
        ];
    }
}
