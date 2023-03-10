<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubserviceTranslation extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "subservice_translations";

    public $timestamps = false;
    protected $fillable = [
        'name',
        'content',
    ];
}
