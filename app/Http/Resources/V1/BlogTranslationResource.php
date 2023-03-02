<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogTranslationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'blogId' => $this->blog_id,
            'locale' => $this->locale,
            'title' => $this->title,
            'content' => $this->content,
        ];
    }
}
