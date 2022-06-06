<?php

namespace App\Http\Controllers;

use App\Models\Charity;
use App\Http\Requests\StoreCharityRequest;
use App\Http\Requests\UpdateCharityRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

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
    public function register(Request $request)
    {
        echo('request');
        return Charity::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'slug' => $request->input('slug'),
                'description'=>$request->input('description'),
                'password' => Hash::make($request->input('password'))]
        );
    }
    public function login(Request $request)
    {
        $charity = $request->only('name', 'password');
        if (!Auth('charity')->attempt($charity)) {
            return response()->json(["message"=>"Login Failed"], 401);
        }
         /** @var \App\Models\Charity $charity **/
        $charity =Auth('charity')->user();
        $token = $charity->createToken('token')->plainTextToken;
        $cookie=cookie('jwt',$token,60*24);
        return response()->json(["message"=>"Success",
        "token"=>$token], 200)->withCookie($cookie);
    }
    public function profile($id){

        
        return response()->json(Charity::find($id),200);

    }
}
