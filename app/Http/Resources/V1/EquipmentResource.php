<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema (
 *     title = "EquipmentResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/Equipment/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "name",
 *         ref = "#/components/schemas/Equipment/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property = "title",
 *         ref = "#/components/schemas/Equipment/properties/title",
 *     ),
 *
 *     @OA\Property (
 *         property = "image",
 *         ref = "#/components/schemas/Equipment/properties/image",
 *     ),
 *
 *     @OA\Property (
 *         property = "createdAt",
 *         ref = "#/components/schemas/Equipment/properties/created_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "updatedAt",
 *         ref = "#/components/schemas/Equipment/properties/updated_at",
 *     ),
 * ),
 *
 * @property int id
 * @property string name
 * @property string title
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
            'id' => $this->id,
            'name' => $this->getTranslatedAttribute('name', app()->getLocale(), config('voyager.multilingual.default')),
            'title' => $this->getTranslatedAttribute('title', app()->getLocale(), config('voyager.multilingual.default')),
            'image' => empty($this->image) ? $this->image : URL::to("/storage") . "/" . str_replace('\\', '/', $this->image),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
