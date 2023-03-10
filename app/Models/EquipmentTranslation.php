<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipmentTranslation extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "equipment_translations";

    public $timestamps = false;
    protected $fillable = [
        'name',
        'title',
    ];
}
