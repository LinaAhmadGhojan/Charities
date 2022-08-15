<?php

namespace App\Http\Controllers;

use App\Models\ProjectCharity;
use App\Http\Requests\StoreProjectCharityRequest;
use App\Http\Requests\UpdateProjectCharityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
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
    public function projectCharitySave(Request $request){
        $rules = [
            //'id_project' => 'required',
            'id_charity' => 'required',
            'start'=>'required',
            'end'=>'required',

            'title'=>'required',
            'description' => 'required'

        ];
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $projectCharity  = ProjectCharity::create($request->all());
        return response()->json($projectCharity,201);
    }
    public function getProjectsCharity($id_charity){
        $project=DB::table('project_charities')->where('id_charity',$id_charity)->get();

        return response()->json($project);
    }
    public function projects(){
        return response()->json(ProjectCharity::get(),200);

    }
}
