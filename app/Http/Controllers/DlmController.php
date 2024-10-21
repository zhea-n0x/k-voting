<?php

namespace App\Http\Controllers;

use App\Models\Dlm;
use Illuminate\Http\Request;

class DlmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get data
        $dlms = Dlm::all();

        //return json
        return response()->json([
            'status' => 'success',
            'data' => $dlms
        ]);
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
     * @param  \App\Models\Dlm  $dlm
     * @return \Illuminate\Http\Response
     */
    public function show(Dlm $dlm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dlm  $dlm
     * @return \Illuminate\Http\Response
     */
    public function edit(Dlm $dlm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dlm  $dlm
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dlm $dlm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dlm  $dlm
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dlm $dlm)
    {
        //
    }
}
