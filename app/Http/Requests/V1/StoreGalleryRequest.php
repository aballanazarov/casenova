<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *     title="StoreGalleryRequest",
 *     @OA\Xml(
 *         name="StoreGalleryRequest"
 *     ),
 *     @OA\Property (
 *         property="image",
 *         ref="#/components/schemas/Gallery/properties/image",
 *     ),
 * ),
 */
class StoreGalleryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'image' => ['string'],
        ];
    }
}
