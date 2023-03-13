<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="ServiceTranslation",
 *     @OA\Xml(
 *         name="ServiceTranslation"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseModel/properties/id",
 *     ),
 *     @OA\Property (
 *         property="service_id",
 *         ref="#/components/schemas/BaseModel/properties/id",
 *     ),
 *     @OA\Property (
 *         property="locale",
 *         ref="#/components/schemas/BaseModel/properties/locale",
 *     ),
 *     @OA\Property (
 *         property="name",
 *         title="name",
 *         format="string",
 *         type="string",
 *     ),
 *     @OA\Property (
 *         property="title",
 *         title="title",
 *         format="string",
 *         type="string",
 *     ),
 * ),
 *
 * @property int id
 * @property int blog_id
 * @property string locale
 * @property string name
 * @property string title
 */
class ServiceTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'title',
    ];
}
