<?php

namespace App\Http\Services;

/**
 * @OA\Schema (
 *      title="ResponseProperties",
 *      @OA\Xml (
 *          name="ResponseProperties"
 *      ),
 *
 *      @OA\Property (
 *          property="unauthenticated",
 *          format="object",
 *          @OA\Property (
 *              property = "message",
 *              type = "object",
 *              ref = "#/components/schemas/BaseProperties/properties/property_message",
 *          ),
 *          example = {
 *              "message": "Unauthenticated."
 *          }
 *      ),
 *
 *      @OA\Property (
 *          property="forbidden",
 *          format="object",
 *          @OA\Property (
 *              property = "message",
 *              type = "object",
 *              ref = "#/components/schemas/BaseProperties/properties/property_message",
 *          ),
 *          example = {
 *              "message": "Forbidden."
 *          }
 *      ),
 * ),
 */
class ResponseProperties
{

}
