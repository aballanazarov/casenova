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
use Illuminate\Support\Facades\URL;

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
     *      tags = {"Subservices"},
     *      summary = "Get list of subservices",
     *      description = "Returns list of subservices",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/SubserviceCollection",
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
        $filter = new SubservicesFilter();
        $queryItems = $filter->transform($request); // [['column', 'operator', 'value']]

        if (count($queryItems) == 0) {
            return SubserviceCollection::make(Subservice::paginate());
        } else {
            $subservice = Subservice::where($queryItems)->paginate();
            return SubserviceCollection::make($subservice->appends($request->query()));
        }
    }


    public function create()
    {
        //
    }


    /**
     * @OA\Post(
     *      path = "/subservices",
     *      operationId = "storeSubservices",
     *      tags = {"Subservices"},
     *      summary = "Create new subservice",
     *      description = "Returns service data",
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref="#/components/schemas/StoreSubserviceRequest",
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
    public function store(StoreSubserviceRequest $request)
    {
        return SubserviceResource::make(Subservice::create($request->all()));
    }


    /**
     * @OA\Get(
     *      path="/subservices/{id}",
     *      operationId="getSubserviceById",
     *      tags={"Services"},
     *      summary="Get subservice information",
     *      description="Returns subservice data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Subservice id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property (
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/SubserviceResource",
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
    public function show(Subservice $subservice)
    {
        return SubserviceResource::make($subservice);
    }


    public function edit(Subservice $subservice)
    {
        //
    }


    /**
     * @OA\Put (
     *      path = "/subservices/{id}",
     *      operationId = "updateSubservice",
     *      tags = {"Subservices"},
     *      summary = "Update subservice",
     *      description = "Returns subservice data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Subservice id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref="#/components/schemas/UpdateSubserviceRequest",
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
    public function update(UpdateSubserviceRequest $request, Subservice $subservice)
    {
        $subservice->update($request->all());
    }


    public function destroy(int $id)
    {
        return Subservice::destroy($id);
    }


    /**
     * @OA\Post (
     *      path = "/subservices/{subservice}/image",
     *      operationId = "imageSubservice",
     *      tags = {"Subservices"},
     *      summary = "Update image for subservice",
     *      description = "Returns subservice status",
     *      @OA\Parameter(
     *          name="subservice",
     *          description="Subservice id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          @OA\MediaType (
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property (
     *                      property="image",
     *                      ref="#/components/schemas/BaseProperties/properties/property_uploads",
     *                  )
     *              )
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              ref="#/components/schemas/BaseProperties/properties/property_boolean_result",
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
    public function image(Subservice $subservice, Request $image)
    {
        if (!is_null($subservice->id) && $subservice->uploadImage($image)) {
            return URL::to("/uploads") . "/" . $subservice->image;
        }

        return "error";
    }
}
