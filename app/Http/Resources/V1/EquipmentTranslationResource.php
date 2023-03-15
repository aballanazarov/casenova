<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     title = "EquipmentTranslationResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/EquipmentTranslation/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "equipmentId",
 *         ref = "#/components/schemas/EquipmentTranslation/properties/equipment_id",
 *     ),
 *
 *     @OA\Property (
 *         property = "locale",
 *         ref = "#/components/schemas/EquipmentTranslation/properties/locale",
 *     ),
 *
 *     @OA\Property (
 *         property = "name",
 *         ref = "#/components/schemas/EquipmentTranslation/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property = "title",
 *         ref = "#/components/schemas/EquipmentTranslation/properties/title",
 *     ),
 * )
 */
class EquipmentTranslationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'equipmentId' => $this->equipment_id,
            'locale' => $this->locale,
            'name' => $this->name,
            'title' => $this->title,
        ];
    }
}
