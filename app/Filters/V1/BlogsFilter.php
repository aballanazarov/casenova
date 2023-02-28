<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class BlogsFilter extends ApiFilter
{
    protected $safeParams = [
        'title' =>  ['lk'],
        'content' =>  ['lk'],
    ];


    protected $columnMap = [];


    protected $operatorMap = [
        'lk' => 'like',
    ];
}
