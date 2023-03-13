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
use Illuminate\Support\Facades\URL;

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
     *      path="/blog",
     *      operationId="getBlogs",
     *      tags={"Blogs"},
     *      summary="Get list of blogs",
     *      description="Returns list of blogs",
     *      @OA\Response (
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/BlogCollection",
     *          )
     *      ),
     *      @OA\Response (
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response (
     *          response=403,
     *          description="Forbidden"
     *      )
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


    public function create()
    {
        //
    }


    /**
     * @OA\Post (
     *      path = "/blog",
     *      operationId = "storeBlog",
     *      tags = {"Blogs"},
     *      summary = "Create new blog",
     *      description = "Returns blog data",
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref="#/components/schemas/StoreBlogRequest",
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
    public function store(StoreBlogRequest $request)
    {
        return BlogResource::make(Blog::create($request->all()));
    }


    /**
     * @OA\Get (
     *      path="/blog/{id}",
     *      operationId="getBlogById",
     *      tags={"Blogs"},
     *      summary="Get blog information",
     *      description="Returns blog data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Blog id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/BaseModel/properties/id",
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              @OA\Property (
     *                  property="data",
     *                  type="object",
     *                  ref="#/components/schemas/BlogResource",
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
    public function show(Blog $blog)
    {
        return BlogResource::make($blog);
    }


    public function edit(Blog $blog)
    {
        //
    }


    /**
     * @OA\Put (
     *      path = "/blog/{id}",
     *      operationId = "updateBlog",
     *      tags = {"Blogs"},
     *      summary = "Update blog",
     *      description = "Returns blog data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Blog id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/BaseModel/properties/id",
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          description = "Pass user credentials",
     *          @OA\JsonContent (
     *              collectionFormat = "multi",
     *              ref="#/components/schemas/UpdateBlogRequest",
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
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());
    }


    public function destroy(Blog $blog)
    {
        //
    }


    /**
     * @OA\Post (
     *      path = "/blog/{blog}/image",
     *      operationId = "imageBlog",
     *      tags = {"Blogs"},
     *      summary = "Update image for blog",
     *      description = "Returns blog status",
     *      @OA\Parameter(
     *          name="blog",
     *          description="Blog id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              ref="#/components/schemas/BaseModel/properties/id",
     *          )
     *      ),
     *      @OA\RequestBody (
     *          required = true,
     *          @OA\MediaType (
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  @OA\Property (
     *                      property="image",
     *                      ref="#/components/schemas/BaseModel/properties/uploads",
     *                  )
     *              )
     *          ),
     *      ),
     *      @OA\Response (
     *          response = 201,
     *          description = "Successful operation",
     *          @OA\JsonContent (
     *              ref="#/components/schemas/BaseModel/properties/booleanResult",
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
    public function image(Blog $blog, Request $image)
    {
        return !is_null($blog->id) && $blog->uploadImage($image);
    }
}
