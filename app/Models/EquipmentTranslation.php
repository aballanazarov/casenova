<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="EquipmentTranslation",
 *     @OA\Xml(
 *         name="EquipmentTranslation"
 *     ),
 *     @OA\Property (
 *         property="id",
 *         ref="#/components/schemas/BaseModel/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="equipment_id",
 *         title="equipment_id",
 *         ref="#/components/schemas/BaseModel/properties/property_id",
 *     ),
 *     @OA\Property (
 *         property="locale",
 *         ref="#/components/schemas/BaseModel/properties/property_locale",
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
 * @property int equipment_id
 * @property string locale
 * @property string name
 * @property string title
 */
class EquipmentTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'name',
        'title',
    ];
}
