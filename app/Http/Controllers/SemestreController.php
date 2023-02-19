<?php

namespace App\Http\Controllers;

use App\Models\semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $semestre = semestre::all();
        return json_encode($semestre);
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
     * @param  \App\Models\semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function show(semestre $semestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function edit(semestre $semestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, semestre $semestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\semestre  $semestre
     * @return \Illuminate\Http\Response
     */
    public function destroy(semestre $semestre)
    {
        //
    }
}
