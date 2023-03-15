<?php

namespace App\Http\Swagger;

/**
 * @OA\Responses (
 *      @OA\Response (
 *          response = 400,
 *          description = "Bad Request",
 *          @OA\JsonContent (
 *              title = "Response",
 *              @OA\Property (
 *                  property = "message",
 *                  type = "object",
 *                  ref = "#/components/schemas/BaseProperties/properties/property_message",
 *              ),
 *              example = {
 *                  "message" : "Bad Request",
 *              },
 *          )
 *      ),
 *
 *      @OA\Response (
 *          response = 401,
 *          description = "Unauthenticated",
 *          @OA\JsonContent (
 *              title = "Response",
 *              @OA\Property (
 *                  property = "message",
 *                  type = "object",
 *                  ref = "#/components/schemas/BaseProperties/properties/property_message",
 *              ),
 *              example = {
 *                  "message" : "Unauthenticated",
 *              },
 *          )
 *      ),
 *
 *      @OA\Response (
 *          response = 403,
 *          description = "Forbidden",
 *          @OA\JsonContent (
 *              title = "Response",
 *              @OA\Property (
 *                  property = "message",
 *                  type = "object",
 *                  ref = "#/components/schemas/BaseProperties/properties/property_message",
 *              ),
 *              example = {
 *                  "message" : "Forbidden",
 *              },
 *          )
 *      ),
 *
 *      @OA\Response (
 *          response = 422,
 *          description = "Unprocessable Content",
 *          @OA\JsonContent (
 *              title = "Response",
 *              @OA\Property (
 *                  property = "message",
 *                  type = "object",
 *                  ref = "#/components/schemas/BaseProperties/properties/property_message",
 *              ),
 *              @OA\Property (
 *                  property = "errors",
 *                  title = "Errors",
 *                  type = "object",
 *                  @OA\Property (
 *                      property = "values",
 *                      title = "Values",
 *                      type = "array",
 *                      @OA\Items (
 *                          ref = "#/components/schemas/BaseProperties/properties/property_message",
 *                      )
 *                  )
 *              ),
 *              example = {
 *                  "message" : "Unprocessable Content. (and 1 more error)",
 *                  "errors" : {
 *                      "values" : {
 *                          "Unprocessable Content Message Error 1",
 *                          "Unprocessable Content Message Error 2",
 *                      }
 *                  }
 *              },
 *          ),
 *      ),
 *
 *      @OA\Response (
 *          response = 500,
 *          description = "Internal Server Error",
 *          @OA\JsonContent (
 *              title = "Response",
 *              @OA\Property (
 *                  property = "message",
 *                  type = "object",
 *                  ref = "#/components/schemas/BaseProperties/properties/property_message",
 *              ),
 *              example = {
 *                  "message" : "Internal Server Error",
 *              },
 *          )
 *      ),
 * )
 */
class Responses
{

}
