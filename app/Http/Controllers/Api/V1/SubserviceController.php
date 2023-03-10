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

/**
 * @OA\Tag (
 *     name="Subservices",
 *     description="API Endpoints of Projects"
 * )
 */
class SubserviceController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/subservices",
     *      operationId = "getSubservices",
     *      tags = {"Blogs"},
     *      summary = "Get list of subservices",
     *      description = "Returns list of subservices",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *      ),
     *      @OA\Response (
     *          response = 401,
     *          description = "Unauthenticated",
     *      ),
     *      @OA\Response (
     *          response = 403,
     *          description = "Forbidden"
     *      )
     * )
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
        $subservice->update($request->all());
    }


    public function destroy(Subservice $subservice)
    {
        //
    }
}
