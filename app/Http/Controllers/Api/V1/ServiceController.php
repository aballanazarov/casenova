<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ServiceCollection;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Service;
use App\Http\Requests\V1\StoreServiceRequest;
use App\Http\Requests\V1\UpdateServiceRequest;
use App\Http\Requests\V1\BulkStoreServiceRequest;
use App\Filters\V1\ServicesFilter;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Tag (
 *     name="Services",
 *     description="API Endpoints of Projects"
 * )
 */
class ServiceController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/services",
     *      operationId = "getServices",
     *      tags = {"Services"},
     *      summary = "Get list of services",
     *      description = "Returns list of services",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/ServiceCollection",
     *          )
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
        $filter = new ServicesFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        $incSubs = $request->query('incSubs');

        $services = Service::where($queryItems);

        if ($incSubs) {
            $services = $services->with('subservices');
        }

        return ServiceCollection::make($services->paginate()->appends($request->query()));
    }


    public function create()
    {
        //
    }


    /**
     * @OA\Post(
     *      path = "/services",
     *      operationId = "storeServices",
     *      tags = {"Services"},
     *      summary = "Create new service",
     *      description = "Returns service data",
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref="#/components/schemas/StoreServiceRequest",
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
     *       ),
     *      @OA\Response (
     *          response = 400,
     *          description = "Bad Request"
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
    public function store(StoreServiceRequest $request)
    {
        return ServiceResource::make(Service::create($request->all()));
    }


    public function bulkStore(BulkStoreServiceRequest $request)
    {
        $bulk = collect($request->all())->map(function ($arr, $key) {
            return Arr::except($arr, []);
        });

        Service::create($bulk->toArray());
    }


    /**
     * @OA\Get(
     *      path="/services/{id}",
     *      operationId="getServiceById",
     *      tags={"Services"},
     *      summary="Get service information",
     *      description="Returns service data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Service id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property (
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/ServiceResource",
     *              )
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
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
    public function show(Service $service)
    {
        $incSubs = request()->query('incSubs');

        if ($incSubs) {
            return ServiceResource::make($service->loadMissing('subservices'));
        }

        return ServiceResource::make($service);
    }


    public function edit(Service $service)
    {
        //
    }


    /**
     * @OA\Put (
     *      path = "/services/{id}",
     *      operationId = "updateServices",
     *      tags = {"Services"},
     *      summary = "Update service",
     *      description = "Returns service data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Service id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref="#/components/schemas/UpdateServiceRequest",
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
     *       ),
     *      @OA\Response (
     *          response = 400,
     *          description = "Bad Request"
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
    public function update(UpdateServiceRequest $request, Service $service)
    {
        return $service->update($request->all());
    }


    public function destroy(Service $service)
    {
        //
    }


    /**
     * @OA\Post (
     *      path = "/services/{service}/image",
     *      operationId = "imageService",
     *      tags = {"Services"},
     *      summary = "Update image for service",
     *      description = "Returns service status",
     *      @OA\Parameter(
     *          name="service",
     *          description="Service id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/BaseModel/properties/id",
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          @OA\MediaType (
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property (
     *                      property="image",
     *                      ref="#/components/schemas/BaseModel/properties/uploads",
     *                  )
     *              )
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              ref="#/components/schemas/BaseModel/properties/booleanResult",
     *          ),
     *       ),
     *      @OA\Response (
     *          response = 400,
     *          description = "Bad Request"
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
    public function image(Service $service, Request $image)
    {
        if (!is_null($service->id) && $service->uploadImage($image)) {
            return URL::to("/uploads") . "/" . $service->image;
        }

        return response(['error' => 'Failed image upload'], 500);
    }
}
