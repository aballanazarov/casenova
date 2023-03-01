<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\BlogTranslation;
use App\Http\Requests\StoreBlogTranslationRequest;
use App\Http\Requests\UpdateBlogTranslationRequest;

class BlogTranslationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBlogTranslationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogTranslationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogTranslation  $blogTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(BlogTranslation $blogTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogTranslation  $blogTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogTranslation $blogTranslation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBlogTranslationRequest  $request
     * @param  \App\Models\BlogTranslation  $blogTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogTranslationRequest $request, BlogTranslation $blogTranslation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogTranslation  $blogTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogTranslation $blogTranslation)
    {
        //
    }
}
