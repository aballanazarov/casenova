<?php

namespace App\Http\Services;

/**
 * @OA\Schema(
 *     title="BaseProperties",
 *     @OA\Xml(
 *         name="BaseProperties"
 *     ),
 *
 *     @OA\Property (
 *         property="property_id",
 *         title="id",
 *         format="integer",
 *         type="integer",
 *         nullable=true,
 *         readOnly="true",
 *         example=1,
 *     ),
 *
 *     @OA\Property (
 *         property="property_time",
 *         title="time",
 *         format="date-time",
 *         type="string",
 *         nullable=true,
 *         readOnly="true",
 *         example="2023-01-01T09:30:59.000000Z",
 *     ),
 *
 *     @OA\Property (
 *         property="property_locale",
 *         title="locale",
 *         format="string",
 *         type="string",
 *         readOnly="true",
 *         example="en",
 *     ),
 *
 *     @OA\Property (
 *         property="property_image",
 *         title="image",
 *         format="string",
 *         type="string",
 *         readOnly="true",
 *         example="https://example.com/uploads/image1.jpg",
 *     ),
 *
 *     @OA\Property (
 *         property="property_uploads",
 *         title="uploads",
 *         format="binary",
 *         type="string",
 *     ),
 *
 *     @OA\Property (
 *         property="property_boolean_result",
 *         title="boolean_result",
 *         format="boolean",
 *         type="boolean",
 *         example="true",
 *     ),

 *     @OA\Property (
 *         property="property_message",
 *         title="property_message",
 *         format="string",
 *         type="string",
 *     ),
 * ),
 */
class BaseProperties
{

}
