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
            return new BlogCollection(Blog::paginate());
        } else {
            $blogs = Blog::where($queryItems)->paginate();
            return new BlogCollection($blogs->appends($request->query()));
        }
    }


    public function create()
    {
        //
    }


    public function store(StoreBlogRequest $request)
    {
        return BlogResource::make(Blog::create($request->all()));
    }


    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }


    public function edit(Blog $blog)
    {
        //
    }


    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog->update($request->all());
    }


    public function destroy(Blog $blog)
    {
        //
    }
}
