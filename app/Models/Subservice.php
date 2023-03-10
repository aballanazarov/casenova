<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subservice extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    /**
     * @var string
     */
    protected $table = "subservices";

    protected $fillable = [
        'service_id',
    ];

    public $translatedAttributes = [
        'name',
        'content',
    ];


    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
