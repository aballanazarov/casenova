<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\ServiceTranslation;
use App\Http\Requests\StoreServiceTranslationRequest;
use App\Http\Requests\UpdateServiceTranslationRequest;

class ServiceTranslationController extends Controller
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
     * @param  \App\Http\Requests\StoreServiceTranslationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceTranslationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceTranslation  $serviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceTranslation $serviceTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceTranslation  $serviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceTranslation $serviceTranslation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceTranslationRequest  $request
     * @param  \App\Models\ServiceTranslation  $serviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceTranslationRequest $request, ServiceTranslation $serviceTranslation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceTranslation  $serviceTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceTranslation $serviceTranslation)
    {
        //
    }
}
