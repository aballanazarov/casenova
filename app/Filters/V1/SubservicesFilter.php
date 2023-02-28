<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class SubservicesFilter extends ApiFilter
{
    protected $safeParams = [
        'name' =>  ['lk'],
        'content' =>  ['lk'],
        'serviceId' =>  ['eq', 'ne'],
    ];


    protected $columnMap = [
        'serviceId' => 'service_id',
    ];


    protected $operatorMap = [
        'lk' => 'like',
        'eq' => '=',
        'ne' => '!=',
    ];
}
