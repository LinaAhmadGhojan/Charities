<?php

namespace App\Http\Controllers;

use App\Models\Needer;
use App\Http\Requests\StoreNeederRequest;
use App\Http\Requests\UpdateNeederRequest;

class NeederController extends Controller
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
     * @param  \App\Http\Requests\StoreNeederRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNeederRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Needer  $needer
     * @return \Illuminate\Http\Response
     */
    public function show(Needer $needer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Needer  $needer
     * @return \Illuminate\Http\Response
     */
    public function edit(Needer $needer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNeederRequest  $request
     * @param  \App\Models\Needer  $needer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNeederRequest $request, Needer $needer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Needer  $needer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Needer $needer)
    {
        //
    }
}
