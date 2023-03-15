<?php

namespace App\Http\Swagger;

/**
 * @OA\Schema (
 *     title = "BaseProperties",
 *
 *     @OA\Property (
 *         property = "property_id",
 *         title = "ID",
 *         type = "integer",
 *         minimum = 1,
 *         exclusiveMinimum = false,
 *         example = 1,
 *     ),
 *
 *     @OA\Property (
 *         property = "property_time",
 *         title = "Date Time",
 *         format = "date-time",
 *         type = "string",
 *         nullable = true,
 *         example = "2023-01-01T09:30:59Z",
 *     ),
 *
 *     @OA\Property (
 *         property = "property_locale",
 *         title = "Locale",
 *         type = "string",
 *         minLength = 2,
 *         maxLength = 2,
 *         example = "en",
 *     ),
 *
 *     @OA\Property (
 *         property = "property_image",
 *         title = "Image Url",
 *         type = "string",
 *         example = "https://example.com/uploads/image1.jpg",
 *     ),
 *
 *     @OA\Property (
 *         property = "property_uploads",
 *         title = "Upload",
 *         format = "binary",
 *         type = "string",
 *         nullable = true,
 *     ),
 *
 *     @OA\Property (
 *         property = "property_boolean_result",
 *         title = "Result Boolean",
 *         type = "boolean",
 *         example = "true",
 *     ),

 *     @OA\Property (
 *         property = "property_message",
 *         title = "Message",
 *         type = "string",
 *         example = "Message",
 *     ),
 * ),
 */
class BaseProperties
{

}
