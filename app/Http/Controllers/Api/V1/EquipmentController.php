<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\EquipmentsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\EquipmentCollection;
use App\Http\Resources\V1\EquipmentResource;
use App\Models\Equipment;
use Illuminate\Http\Request;

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


    public function store(Request $request)
    {
        //
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


    public function update(Request $request, Equipment $equipment)
    {
        //
    }


    public function destroy(int $id)
    {
        //
    }
}
