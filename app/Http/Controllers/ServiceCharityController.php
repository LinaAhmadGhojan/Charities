<?php

namespace App\Http\Controllers;

use App\Models\ServiceCharity;
use App\Http\Requests\StoreServiceCharityRequest;
use App\Http\Requests\UpdateServiceCharityRequest;

class ServiceCharityController extends Controller
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
     * @param  \App\Http\Requests\StoreServiceCharityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceCharityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceCharity  $serviceCharity
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceCharity $serviceCharity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceCharity  $serviceCharity
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceCharity $serviceCharity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceCharityRequest  $request
     * @param  \App\Models\ServiceCharity  $serviceCharity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceCharityRequest $request, ServiceCharity $serviceCharity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceCharity  $serviceCharity
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceCharity $serviceCharity)
    {
        //
    }
}
