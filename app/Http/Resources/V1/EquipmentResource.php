<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

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
 *             ref="#/components/schemas/EquipmentTranslationResource",
 *         ),
 *     ),
 * ),
 *
 * @property int id
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
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => EquipmentTranslationResource::collection($this->translations),
        ];
    }
}
