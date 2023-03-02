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

class BlogController extends Controller
{
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
        return new BlogResource(Blog::create($request->all()));
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
        //
    }


    public function destroy(Blog $blog)
    {
        //
    }
}
