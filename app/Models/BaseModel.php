<?php

namespace App\Models;

/**
 * @OA\Schema(
 *     title="BaseModel",
 *     @OA\Xml(
 *         name="BaseModel"
 *     ),
 *
 *     @OA\Property (
 *         property="id",
 *         title="id",
 *         format="integer",
 *         type="integer",
 *         nullable=true,
 *         readOnly="true",
 *         example=1,
 *     ),
 *
 *     @OA\Property (
 *         property="created_at",
 *         title="created_at",
 *         format="date-time",
 *         type="string",
 *         nullable=true,
 *         readOnly="true",
 *         example="2023-01-01T09:30:59.000000Z",
 *     ),
 *
 *     @OA\Property (
 *         property="updated_at",
 *         title="updated_at",
 *         format="date-time",
 *         type="string",
 *         nullable=true,
 *         readOnly="true",
 *         example="2023-01-01T09:30:59.000000Z",
 *     ),
 *
 *     @OA\Property (
 *         property="locale",
 *         title="locale",
 *         format="string",
 *         type="string",
 *         readOnly="true",
 *         example="en",
 *     ),
 * ),
 */
class BaseModel
{

}
