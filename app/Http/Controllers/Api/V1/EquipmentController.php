<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\EquipmentsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EquipmentCollection;
use App\Http\Resources\V1\EquipmentResource;
use App\Models\Equipment;
use App\Http\Requests\V1\StoreEquipmentRequest;
use App\Http\Requests\V1\UpdateEquipmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

/**
 * @OA\Tag (
 *     name = "Equipments",
 *     description = "API Endpoints of Projects"
 * )
 */
class EquipmentController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/equipment",
     *      operationId = "getEquipments",
     *      tags = {"Equipments"},
     *      summary = "Get list of equipments",
     *      description = "Returns list of equipments",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              ref = "#/components/schemas/EquipmentCollection",
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
        $filter = new EquipmentsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return EquipmentCollection::make(Equipment::paginate());
        } else {
            $equipments = Equipment::where($queryItems)->paginate();
            return EquipmentCollection::make($equipments->appends($request->query()));
        }
    }


    /**
     * @OA\Post(
     *      path = "/admin/equipment",
     *      operationId = "storeEquipments",
     *      tags = {"Equipments"},
     *      summary = "Create new equipment",
     *      description = "Returns equipment data",
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref = "#/components/schemas/StoreEquipmentRequest",
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
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
    public function store(StoreEquipmentRequest $request)
    {
        return EquipmentResource::make(Equipment::create($request->all()));
    }


    /**
     * @OA\Get (
     *      path = "/equipment/{id}",
     *      operationId = "getEquipmentById",
     *      tags = {"Equipments"},
     *      summary = "Get equipment information",
     *      description = "Returns equipment data",
     *      @OA\Parameter(
     *          name = "id",
     *          description = "Equipment id",
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
     *                  ref = "#/components/schemas/EquipmentResource",
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
    public function show(Equipment $equipment)
    {
        return EquipmentResource::make($equipment);
    }


    /**
     * @OA\Put (
     *      path = "/admin/equipment/{id}",
     *      operationId = "updateEquipment",
     *      tags = {"Equipments"},
     *      summary = "Update equipment",
     *      description = "Returns equipment data",
     *      @OA\Parameter(
     *          name = "id",
     *          description = "Equipment id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema(
     *              ref = "#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref = "#/components/schemas/UpdateEquipmentRequest",
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
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
    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->all());
    }


    /**
     * @OA\Delete (
     *      path = "/admin/equipment/{id}",
     *      operationId = "destroyEquipment",
     *      tags = {"Equipments"},
     *      summary = "Destroy Equipment",
     *      description = "Return bool",
     *      @OA\Parameter(
     *          name = "id",
     *          description = "Equipment id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema(
     *              ref = "#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
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
    public function destroy(int $id)
    {
        return Equipment::destroy($id);
    }


    /**
     * @OA\Post (
     *      path = "/admin/equipment/{equipment}/image",
     *      operationId = "imageEquipment",
     *      tags = {"Equipments"},
     *      summary = "Update image for equipment",
     *      description = "Returns equipment status",
     *      @OA\Parameter(
     *          name = "equipment",
     *          description = "Equipment id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema(
     *              ref = "#/components/schemas/BaseProperties/properties/property_id",
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          @OA\MediaType (
     *              mediaType = "multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property (
     *                      property = "image",
     *                      ref = "#/components/schemas/BaseProperties/properties/property_uploads",
     *                  )
     *              )
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              ref = "#/components/schemas/BaseProperties/properties/property_boolean_result",
     *          ),
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
    public function image(Equipment $equipment, Request $image)
    {
        if (!is_null($equipment->id) && $equipment->uploadImage($image)) {
            return URL::to("/uploads") . "/" . $equipment->image;
        }

        return "error";
    }
}
