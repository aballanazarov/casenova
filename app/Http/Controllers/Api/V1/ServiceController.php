<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ServiceCollection;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Service;
use App\Http\Requests\V1\StoreServiceRequest;
use App\Http\Requests\V1\UpdateServiceRequest;
use App\Http\Requests\V1\BulkStoreServiceRequest;
use App\Http\Requests\V1\BulkStoreServiceTranslationRequest;
use App\Filters\V1\ServicesFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ServiceController extends Controller
{
    /**
     * @OA\Get(
     *      path = "/services",
     *      operationId = "getServices",
     *      tags = {"Services"},
     *      summary = "Get list of services",
     *      description = "Returns list of services",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     * )
     */
    public function index(Request $request)
    {
        $filter = new ServicesFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        $incSubs = $request->query('incSubs');

        $services = Service::where($queryItems);

        if ($incSubs) {
            $services = $services->with('subservices');
        }

        return new ServiceCollection($services->paginate()->appends($request->query()));
    }


    public function create()
    {
        //
    }


    public function store(StoreServiceRequest $request)
    {
        return new ServiceResource(Service::create($request->all()));
    }


    public function bulkStore(BulkStoreServiceRequest $request)
    {
        $bulk = collect($request->all())->map(function ($arr, $key) {
            return Arr::except($arr, []);
        });

        Service::create($bulk->toArray());
    }


    public function show(Service $service)
    {
        $incSubs = request()->query('incSubs');

        if ($incSubs) {
            return new ServiceResource($service->loadMissing('subservices'));
        }

        return new ServiceResource($service);
    }


    public function edit(Service $service)
    {
        //
    }


    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->all());
    }


    public function destroy(Service $service)
    {
        //
    }
}
