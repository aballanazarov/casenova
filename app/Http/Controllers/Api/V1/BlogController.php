<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\BlogsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogCollection;
use App\Http\Resources\V1\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

/**
 * @OA\Tag (
 *     name="Blogs",
 *     description="API Endpoints of Projects"
 * )
 */
class BlogController extends Controller
{
    /**
     * @OA\Get (
     *      path = "/blog",
     *      operationId = "getBlogs",
     *      tags = {"Blogs"},
     *      summary = "Get list of blogs",
     *      description = "Returns list of blogs",
     *      @OA\Parameter(
     *          name="Accept-Language",
     *          in="header",
     *          @OA\Schema(
     *              type="string",
     *          )
     *      ),
     *      @OA\Response (
     *          response = 200,
     *          description = "Successful operation",
     *          @OA\JsonContent(
     *              ref = "#/components/schemas/BlogCollection",
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
        $filter = new BlogsFilter();
        $queryItems = $filter->transform($request);

        if (count($queryItems) == 0) {
            return BlogCollection::make(Blog::paginate());
        } else {
            $blogs = Blog::where($queryItems)->paginate();
            return BlogCollection::make($blogs->appends($request->query()));
        }
    }


    public function store(Request $request)
    {
        //
    }


    /**
     * @OA\Get (
     *      path = "/blog/{id}",
     *      operationId = "getBlogById",
     *      tags = {"Blogs"},
     *      summary = "Get blog information",
     *      description = "Returns blog data",
     *      @OA\Parameter (
     *          name = "id",
     *          description = "Blog id",
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
     *                  ref = "#/components/schemas/BlogResource",
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
    public function show(Blog $blog)
    {
        return BlogResource::make($blog);
    }


    public function update(Request $request, Blog $blog)
    {
        //
    }


    public function destroy(int $id)
    {
        //
    }
}
