<?php

namespace App\Http\Controllers;

use App\Models\ProblemEntry;
use App\Http\Requests\StoreProblemEntryRequest;
use App\Http\Requests\UpdateProblemEntryRequest;

class ProblemEntryController extends Controller
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
     * @param  \App\Http\Requests\StoreProblemEntryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProblemEntryRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProblemEntry  $problemEntry
     * @return \Illuminate\Http\Response
     */
    public function show(ProblemEntry $problemEntry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProblemEntry  $problemEntry
     * @return \Illuminate\Http\Response
     */
    public function edit(ProblemEntry $problemEntry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProblemEntryRequest  $request
     * @param  \App\Models\ProblemEntry  $problemEntry
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProblemEntryRequest $request, ProblemEntry $problemEntry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProblemEntry  $problemEntry
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProblemEntry $problemEntry)
    {
        //
    }
}
