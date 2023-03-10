<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
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
