<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Schema (
 *     title = "SubserviceResource",
 *
 *     @OA\Property (
 *         property = "id",
 *         ref = "#/components/schemas/Subservice/properties/id",
 *     ),
 *
 *     @OA\Property (
 *         property = "name",
 *         ref = "#/components/schemas/Subservice/properties/name",
 *     ),
 *
 *     @OA\Property (
 *         property = "content",
 *         ref = "#/components/schemas/Subservice/properties/content",
 *     ),
 *
 *     @OA\Property (
 *         property = "image",
 *         ref = "#/components/schemas/Subservice/properties/image",
 *     ),
 *
 *     @OA\Property (
 *         property = "createdAt",
 *         ref = "#/components/schemas/Subservice/properties/created_at",
 *     ),
 *
 *     @OA\Property (
 *         property = "updatedAt",
 *         ref = "#/components/schemas/Subservice/properties/updated_at",
 *     ),
 * ),
 *
 * @property int id
 * @property string service_id
 * @property string name
 * @property string content
 * @property string image
 * @property string created_at
 * @property string updated_at
 * @property string translations
 */

class SubserviceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'serviceId' => $this->service_id,
            'name' => $this->getTranslatedAttribute('name', app()->getLocale(), config('voyager.multilingual.default')),
            'content' => $this->getTranslatedAttribute('content', app()->getLocale(), config('voyager.multilingual.default')),
            'image' => empty($this->image) ? $this->image : URL::to("/storage") . "/" . str_replace('\\', '/', $this->image),
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,
        ];
    }
}
