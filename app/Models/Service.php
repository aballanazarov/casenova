<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    /**
     * @var string
     */
    protected $table = "services";

    public $translatedAttributes = [
        'name',
        'title',
    ];


    public function subservices()
    {
        return $this->hasMany(Subservice::class);
    }
}
