<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GalleryCollection;
use App\Http\Resources\V1\GalleryResource;
use App\Models\Gallery;
use Illuminate\Http\Request;

/**
 * @OA\Tag (
 *     name = "Galleries",
 *     description = "API Endpoints of Gallery"
 * )
 */

class GalleryController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/galleries",
     *      operationId = "getGalleries",
     *      tags = {"Galleries"},
     *      summary = "Get list of galleries",
     *      description = "Returns list of galleries",
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              ref="#/components/schemas/GalleryCollection",
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
    public function index()
    {
        return GalleryCollection::make(Gallery::all());
    }


    public function store(Request $request)
    {
        //
    }


    /**
     * @OA\Get (
     *      path = "/galleries/{id}",
     *      operationId = "getGalleryById",
     *      tags = {"Galleries"},
     *      summary = "Get gallery information",
     *      description = "Returns gallery data",
     *      @OA\Parameter (
     *          name = "id",
     *          description = "Gallery id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema(
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
     *                  ref = "#/components/schemas/GalleryResource",
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
    public function show(Gallery $gallery)
    {
        return GalleryResource::make($gallery);
    }


    public function update(Request $request, Gallery $gallery)
    {
        //
    }


    public function destroy(int $id)
    {
        //
    }
}
