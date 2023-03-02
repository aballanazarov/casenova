<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceTranslationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'serviceId' => $this->service_id,
            'locale' => $this->locale,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
