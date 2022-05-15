<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Http\Requests\StoreCharityRequest;
use App\Http\Requests\UpdateCharityRequest;

class CharityController extends Controller
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
     * @param  \App\Http\Requests\StoreCharityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCharityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function show(Charity $charity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function edit(Charity $charity)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCharityRequest  $request
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCharityRequest $request, Charity $charity)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Charity  $charity
     * @return \Illuminate\Http\Response
     */
    public function destroy(Charity $charity)
    {
        //
    }
}
