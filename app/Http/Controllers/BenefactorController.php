<?php

namespace App\Http\Controllers;

use App\Models\Benefactor;
use App\Http\Requests\StoreBenefactorRequest;
use App\Http\Requests\UpdateBenefactorRequest;

class BenefactorController extends Controller
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
     * @param  \App\Http\Requests\StoreBenefactorRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBenefactorRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Benefactor  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function show(Benefactor $benefactor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Benefactor  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function edit(Benefactor $benefactor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBenefactorRequest  $request
     * @param  \App\Models\Benefactor  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBenefactorRequest $request, Benefactor $benefactor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Benefactor  $benefactor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Benefactor $benefactor)
    {
        //
    }
}
