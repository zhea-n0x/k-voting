<?php

namespace App\Http\Controllers;

use App\Models\Bem;
use Illuminate\Http\Request;

class BemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data
        $bems = Bem::all();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'List Data Bem',
            'data' => $bems
        ], 200);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bem  $bem
     * @return \Illuminate\Http\Response
     */
    public function show(Bem $bem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bem  $bem
     * @return \Illuminate\Http\Response
     */
    public function edit(Bem $bem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bem  $bem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bem $bem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bem  $bem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bem $bem)
    {
        //
    }
}
