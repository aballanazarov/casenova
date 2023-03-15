<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\GalleryCollection;
use App\Http\Resources\V1\GalleryResource;
use App\Models\Gallery;
use App\Http\Requests\V1\StoreGalleryRequest;
use App\Http\Requests\V1\UpdateGalleryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

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


    /**
     * @OA\Post (
     *      path = "/admin/galleries",
     *      operationId = "storeGalleries",
     *      tags = {"Galleries"},
     *      summary = "Create new gallery",
     *      description = "Returns gallery data",
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass gallery credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref = "#/components/schemas/StoreGalleryRequest",
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
    public function store(StoreGalleryRequest $request)
    {
        return GalleryResource::make(Gallery::query()->create($request->all()));
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


    /**
     * @OA\Put (
     *      path = "/admin/galleries/{id}",
     *      operationId = "updateGalleries",
     *      tags = {"Galleries"},
     *      summary = "Update gallery",
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
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass gallery credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref = "#/components/schemas/UpdateGalleryRequest",
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
    public function update(UpdateGalleryRequest $request, Gallery $gallery)
    {
        return $gallery->update($request->all());
    }


    /**
     * @OA\Delete (
     *      path = "/admin/galleries/{gallery}",
     *      operationId = "destroyGallery",
     *      tags = {"Galleries"},
     *      summary = "Destroy gallery",
     *      description = "Returns bool",
     *      @OA\Parameter(
     *          name = "id",
     *          description = "Gallery id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema(
     *              ref = "#/components/schemas/BaseProperties/properties/property_id",
     *          )
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
    public function destroy(int $id)
    {
        return Gallery::destroy($id);
    }


    /**
     * @OA\Post (
     *      path = "/admin/galleries/{gallery}/image",
     *      operationId = "imageGallery",
     *      tags = {"Galleries"},
     *      summary = "Update image for gallery",
     *      description = "Returns gallery status",
     *      @OA\Parameter (
     *          name = "gallery",
     *          description = "Gallery id",
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
    public function image(Gallery $gallery, Request $image)
    {
        if (!is_null($gallery->id) && $gallery->uploadImage($image)) {
            return URL::to("/uploads") . "/" . $gallery->image;
        }

        return response(['error' => 'Failed image upload'], 500);
    }
}
