<?php

namespace App\Http\Controllers;

use App\Models\ProjectCharity;
use App\Http\Requests\StoreProjectCharityRequest;
use App\Http\Requests\UpdateProjectCharityRequest;

class ProjectCharityController extends Controller
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
     * @param  \App\Http\Requests\StoreProjectCharityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectCharityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProjectCharity  $projectCharity
     * @return \Illuminate\Http\Response
     */
    public function show(ProjectCharity $projectCharity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProjectCharity  $projectCharity
     * @return \Illuminate\Http\Response
     */
    public function edit(ProjectCharity $projectCharity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectCharityRequest  $request
     * @param  \App\Models\ProjectCharity  $projectCharity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectCharityRequest $request, ProjectCharity $projectCharity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProjectCharity  $projectCharity
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProjectCharity $projectCharity)
    {
        //
    }
}