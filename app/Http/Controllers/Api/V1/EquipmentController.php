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

/**
 * @OA\Tag (
 *     name="Equipments",
 *     description="API Endpoints of Projects"
 * )
 */
class EquipmentController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/equipments",
     *      operationId = "getEquipments",
     *      tags = {"Equipments"},
     *      summary = "Get list of equipments",
     *      description = "Returns list of equipments",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/EquipmentCollection",
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
            return new EquipmentCollection(Equipment::paginate());
        } else {
            $equipments = Equipment::where($queryItems)->paginate();
            return new EquipmentCollection($equipments->appends($request->query()));
        }
    }


    public function create()
    {
        //
    }


    public function store(StoreEquipmentRequest $request)
    {
        return new EquipmentResource(Equipment::create($request->all()));
    }


    public function show(Equipment $equipment)
    {
        return new EquipmentResource($equipment);
    }


    public function edit(Equipment $equipment)
    {
        //
    }


    public function update(UpdateEquipmentRequest $request, Equipment $equipment)
    {
        $equipment->update($request->all());
    }


    public function destroy(Equipment $equipment)
    {
        //
    }
}
