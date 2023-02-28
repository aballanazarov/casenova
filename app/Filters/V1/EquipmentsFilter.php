<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class EquipmentsFilter extends ApiFilter
{
    protected $safeParams = [
        'name' =>  ['lk'],
        'title' =>  ['lk'],
    ];


    protected $columnMap = [];


    protected $operatorMap = [
        'lk' => 'like',
    ];
}
