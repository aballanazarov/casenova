<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class SubserviceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'serviceId' => $this->service_id,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'translations' => $this->translations,
        ];
    }
}
