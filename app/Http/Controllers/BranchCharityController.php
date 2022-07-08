<?php

namespace App\Http\Controllers;

use App\Models\BranchCharity;
use App\Http\Requests\StoreBranchCharityRequest;
use App\Http\Requests\UpdateBranchCharityRequest;

class BranchCharityController extends Controller
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
     * @param  \App\Http\Requests\StoreBranchCharityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranchCharityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BranchCharity  $branchCharity
     * @return \Illuminate\Http\Response
     */
    public function show(BranchCharity $branchCharity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BranchCharity  $branchCharity
     * @return \Illuminate\Http\Response
     */
    public function edit(BranchCharity $branchCharity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBranchCharityRequest  $request
     * @param  \App\Models\BranchCharity  $branchCharity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBranchCharityRequest $request, BranchCharity $branchCharity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BranchCharity  $branchCharity
     * @return \Illuminate\Http\Response
     */
    public function destroy(BranchCharity $branchCharity)
    {
        //
    }
}
