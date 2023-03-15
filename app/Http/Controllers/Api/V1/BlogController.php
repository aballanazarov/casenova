<?php

namespace App\Http\Controllers\Api\V1;

use App\Filters\V1\BlogsFilter;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BlogCollection;
use App\Http\Resources\V1\BlogResource;
use App\Models\Blog;
use App\Http\Requests\V1\StoreBlogRequest;
use App\Http\Requests\V1\UpdateBlogRequest;
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


    /**
     * @OA\Post (
     *      path = "/admin/blog",
     *      operationId = "storeBlog",
     *      tags = {"Blogs"},
     *      summary = "Create new Blog",
     *      description = "Returns Blog data",
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass blog credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref = "#/components/schemas/StoreBlogRequest",
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
    public function store(StoreBlogRequest $request)
    {
        return BlogResource::make(Blog::create($request->all()));
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


    /**
     * @OA\Put (
     *      path = "/admin/blog/{id}",
     *      operationId = "updateBlog",
     *      tags = {"Blogs"},
     *      summary = "Update blog",
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
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref = "#/components/schemas/UpdateBlogRequest",
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
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());
    }


    /**
     * @OA\Delete (
     *      path = "/admin/blog/{id}",
     *      operationId = "destroyBlog",
     *      tags = {"Blogs"},
     *      summary = "Destroy Blog",
     *      description = "Return bool",
     *      @OA\Parameter (
     *          name = "id",
     *          description = "Blog id",
     *          required = true,
     *          in = "path",
     *          @OA\Schema (
     *              ref = "#/components/schemas/BaseProperties/properties/property_id",
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
    public function destroy(int $id)
    {
        return Blog::destroy($id);
    }


    /**
     * @OA\Post (
     *      path = "/admin/blog/{blog}/image",
     *      operationId = "imageBlog",
     *      tags = {"Blogs"},
     *      summary = "Update image for blog",
     *      description = "Returns blog status",
     *      @OA\Parameter (
     *          name = "blog",
     *          description = "Blog id",
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
    public function image(Blog $blog, Request $image)
    {
        return !is_null($blog->id) && $blog->uploadImage($image);
    }
}
