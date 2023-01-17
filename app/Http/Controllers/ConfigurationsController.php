<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreconfigurationsRequest;
use App\Http\Requests\UpdateconfigurationsRequest;
use App\Models\configurations;

class ConfigurationsController extends Controller
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
     * @param  \App\Http\Requests\StoreconfigurationsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreconfigurationsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\configurations  $configurations
     * @return \Illuminate\Http\Response
     */
    public function show(configurations $configurations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\configurations  $configurations
     * @return \Illuminate\Http\Response
     */
    public function edit(configurations $configurations)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateconfigurationsRequest  $request
     * @param  \App\Models\configurations  $configurations
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateconfigurationsRequest $request, configurations $configurations)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\configurations  $configurations
     * @return \Illuminate\Http\Response
     */
    public function destroy(configurations $configurations)
    {
        //
    }
}
