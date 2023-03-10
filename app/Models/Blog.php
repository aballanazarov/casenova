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
 * )
 * @property string $title
 */
class Blog extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;

    /**
     * @var string
     */
    protected $table = "blogs";


    /**
     * @OA\Property {
     *     title="id",
     *     description="User ID",
     *     format="int64",
     *     nullable=false,
     *     example="1"
     * }
     *
     * @var integer
     */

    /**
     * @OA\Property {
     *     title="created_at",
     *     description="Date of Model creation",
     *     format="date-time"
     *     nullable=true,
     * }
     *
     * @var string
     */

    /**
     * @OA\Property {
     *     title="updated_at",
     *     description="Date of last updating Model data",
     *     format="date-time"
     *     nullable=true,
     * }
     *
     * @var string
     */

    /**
     * @OA\Property {
     *     property="translations",
     *     title="translations",
     *     description="Translations",
     * }
     *
     * @var BlogTranslation[]
     */
    public $translatedAttributes = [
        'title',
        'content',
    ];
}
