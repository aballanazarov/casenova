<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\SubservicesFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SubserviceCollection;
use App\Http\Resources\V1\SubserviceResource;
use App\Models\Subservice;
use App\Http\Requests\StoreSubserviceRequest;
use App\Http\Requests\UpdateSubserviceRequest;
use Illuminate\Http\Request;

class SubserviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return SubserviceCollection
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubserviceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubserviceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subservice  $subservice
     * @return SubserviceResource
     */
    public function show(Subservice $subservice)
    {
        return new SubserviceResource($subservice);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subservice  $subservice
     * @return \Illuminate\Http\Response
     */
    public function edit(Subservice $subservice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubserviceRequest  $request
     * @param  \App\Models\Subservice  $subservice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubserviceRequest $request, Subservice $subservice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subservice  $subservice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subservice $subservice)
    {
        //
    }
}
