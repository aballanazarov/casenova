<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema (
 *     title="BlogTranslation",
 * )
 */

class BlogTranslation extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "blog_translations";

    public $timestamps = false;

    /**
     * @OA\Property {
     *     title="title",
     *     description="Title",
     *     format="string",
     *     nullable=false,
     *     example="1"
     * }
     *
     * @var string
     */
    private $title;

    /**
     * @OA\Property {
     *     title="content",
     *     description="Content",
     *     format="string",
     *     nullable=false,
     *     example="1"
     * }
     *
     * @var string
     */
    private $content;


    protected $fillable = [
        'title',
        'content',
    ];
}
