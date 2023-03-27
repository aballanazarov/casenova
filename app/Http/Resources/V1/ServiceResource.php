<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema (
 *     title = "ServiceResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/Service/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "name",
 *         ref = "#/components/schemas/Service/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property = "title",
 *         ref = "#/components/schemas/Service/properties/title",
 *     ),
 *
 *     @OA\Property (
 *         property = "image",
 *         ref = "#/components/schemas/Service/properties/image",
 *     ),
 *
 *     @OA\Property (
 *         property = "createdAt",
 *         ref = "#/components/schemas/Service/properties/created_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "updatedAt",
 *         ref = "#/components/schemas/Service/properties/updated_at",
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
class ServiceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'title' => $this->title,
            'image' => empty($this->image) ? $this->image : URL::to("/storage") . "/" . str_replace('\\', '/', $this->image),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
            'subservices' => SubserviceResource::collection($this->whenLoaded('subservices')),
        ];
    }
}
