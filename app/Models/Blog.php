<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

/**
 * @OA\Schema (
 *     title="Blog",
 *     description="Blog",
 *     @OA\Xml(
 *         name="Blog"
 *     ),
 * ),
 *
 * @var string $create_at
 * @var string $update_at
 */
class Blog extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = [
        'title',
        'content',
    ];
}
