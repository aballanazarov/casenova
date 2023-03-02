<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

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
