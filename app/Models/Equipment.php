<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    /**
     * @var string
     */
    protected $table = "equipment";

    public $translatedAttributes = [
        'name',
        'title',
    ];
}
