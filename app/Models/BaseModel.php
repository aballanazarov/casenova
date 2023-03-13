<?php

namespace App\Models;

/**
 * @OA\Schema(
 *     title="BaseModel",
 *     description="Base Model",
 *     @OA\Xml(
 *         name="BaseModel"
 *     ),
 *
 *     @OA\Property (
 *         property="id",
 *         title="id",
 *         description="Id",
 *         format="integer",
 *         type="integer",
 *         nullable=true,
 *         readOnly="true",
 *     ),
 *
 *     @OA\Property (
 *         property="created_at",
 *         title="created_at",
 *         description="Date of Model creation",
 *         format="date-time",
 *         type="string",
 *         nullable=true,
 *         readOnly="true",
 *     ),
 *
 *     @OA\Property (
 *         property="updated_at",
 *         title="updated_at",
 *         description="Date of last updating Model data",
 *         format="date-time",
 *         type="string",
 *         nullable=true,
 *         readOnly="true",
 *     ),
 *
 *     @OA\Property (
 *         property="locale",
 *         title="locale",
 *         description="locale",
 *         format="string",
 *         type="string",
 *         readOnly="true",
 *     ),
 * ),
 */
class BaseModel
{

}
