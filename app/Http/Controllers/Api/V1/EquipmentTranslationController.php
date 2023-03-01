<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\EquipmentTranslation;
use App\Http\Requests\StoreEquipmentTranslationRequest;
use App\Http\Requests\UpdateEquipmentTranslationRequest;

class EquipmentTranslationController extends Controller
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
     * @param  \App\Http\Requests\StoreEquipmentTranslationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEquipmentTranslationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Http\Response
     */
    public function show(EquipmentTranslation $equipmentTranslation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Http\Response
     */
    public function edit(EquipmentTranslation $equipmentTranslation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipmentTranslationRequest  $request
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEquipmentTranslationRequest $request, EquipmentTranslation $equipmentTranslation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EquipmentTranslation  $equipmentTranslation
     * @return \Illuminate\Http\Response
     */
    public function destroy(EquipmentTranslation $equipmentTranslation)
    {
        //
    }
}
