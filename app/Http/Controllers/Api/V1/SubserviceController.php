<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\SubservicesFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\SubserviceCollection;
use App\Http\Resources\V1\SubserviceResource;
use App\Models\Subservice;
use Illuminate\Http\Request;

/**
 * @OA\Tag (
 *     name = "Subservices",
 *     description = "API Endpoints of Projects"
 * )
 */
class SubserviceController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/subservices",
     *      operationId = "getSubservices",
     *      tags = {"Subservices"},
     *      summary = "Get list of subservices",
     *      description = "Returns list of subservices",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              ref = "#/components/schemas/SubserviceCollection",
     *          )
     *      ),
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
    public function index(Request $request)
    {
        $filter = new SubservicesFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            return SubserviceCollection::make(Subservice::paginate());
        } else {
            $subservice = Subservice::where($queryItems)->paginate();
            return SubserviceCollection::make($subservice->appends($request->query()));
        }
    }


    public function store(Request $request)
    {
        //
    }


    /**
     * @OA\Get (
     *      path = "/subservices/{id}",
     *      operationId = "getSubserviceById",
     *      tags = {"Subservices"},
     *      summary = "Get subservice information",
     *      description = "Returns subservice data",
     *      @OA\Parameter(
     *          name = "id",
     *          description = "Subservice id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema(
     *              ref = "#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\Response(
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property (
     *                  property = "data",
     *                  type = "object",
     *                  ref = "#/components/schemas/SubserviceResource",
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
    public function show(Subservice $subservice)
    {
        return SubserviceResource::make($subservice);
    }


    public function update(Request $request, Subservice $subservice)
    {
        //
    }


    public function destroy(int $id)
    {
        //
    }
}
