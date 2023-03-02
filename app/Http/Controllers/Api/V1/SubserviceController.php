<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\SubservicesFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SubserviceCollection;
use App\Http\Resources\V1\SubserviceResource;
use App\Models\Subservice;
use App\Http\Requests\V1\StoreSubserviceRequest;
use App\Http\Requests\V1\UpdateSubserviceRequest;
use Illuminate\Http\Request;

class SubserviceController extends Controller
{
    public function index(Request $request)
    {
        $filter = new SubservicesFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            return new SubserviceCollection(Subservice::paginate());
        } else {
            $subservice = Subservice::where($queryItems)->paginate();
            return new SubserviceCollection($subservice->appends($request->query()));
        }
    }


    public function create()
    {
        //
    }


    public function store(StoreSubserviceRequest $request)
    {
        return new SubserviceResource(Subservice::create($request->all()));
    }


    public function show(Subservice $subservice)
    {
        return new SubserviceResource($subservice);
    }


    public function edit(Subservice $subservice)
    {
        //
    }


    public function update(UpdateSubserviceRequest $request, Subservice $subservice)
    {
        //
    }


    public function destroy(Subservice $subservice)
    {
        //
    }
}
