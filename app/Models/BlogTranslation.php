<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = "blog_translations";

    public $timestamps = false;
    protected $fillable = [
        'title',
        'content',
    ];
}
