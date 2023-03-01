<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\SubserviceTranslation;
use App\Http\Requests\StoreSubserviceTranslationRequest;
use App\Http\Requests\UpdateSubserviceTranslationRequest;

class SubserviceTranslationController extends Controller
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
     * @param  \App\Http\Requests\StoreSubserviceTranslationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubserviceTranslationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubserviceTranslation  $subserviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(SubserviceTranslation $subserviceTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubserviceTranslation  $subserviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(SubserviceTranslation $subserviceTranslation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubserviceTranslationRequest  $request
     * @param  \App\Models\SubserviceTranslation  $subserviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubserviceTranslationRequest $request, SubserviceTranslation $subserviceTranslation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubserviceTranslation  $subserviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubserviceTranslation $subserviceTranslation)
    {
        //
    }
}
