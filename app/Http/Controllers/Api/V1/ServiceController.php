<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ServiceCollection;
use App\Http\Resources\V1\ServiceResource;
use App\Models\Service;
use App\Filters\V1\ServicesFilter;
use Illuminate\Http\Request;

/**
 * @OA\Tag (
 *     name = "Services",
 *     description = "API Endpoints of Projects"
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
     *          @OA\JsonContent (
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


    public function store(Request $request)
    {
        //
    }


    /**
     * @OA\Get (
     *      path = "/services/{id}",
     *      operationId = "getServiceById",
     *      tags = {"Services"},
     *      summary = "Get service information",
     *      description = "Returns service data",
     *      @OA\Parameter (
     *          name = "id",
     *          description = "Service id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema (
     *              ref = "#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property (
     *                  property = "data",
     *                  type = "object",
     *                  ref = "#/components/schemas/ServiceResource",
     *              )
     *          )
     *       ),
     *      @OA\Response (
     *          response = 400,
     *          ref = "#/components/responses/400",
     *      ),
     *      @OA\Response (
     *          response = 401,
     *          ref = "#/components/responses/401",
     *      ),
     *      @OA\Response (
     *          response = 403,
     *          ref = "#/components/responses/403",
     *      ),
     *      @OA\Response (
     *          response = 422,
     *          ref = "#/components/responses/422",
     *      ),
     *      @OA\Response (
     *          response = 500,
     *          ref = "#/components/responses/500",
     *      ),
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


    public function update(Request $request, Service $service)
    {
        //
    }


    public function destroy(int $id)
    {
        //
    }
}
