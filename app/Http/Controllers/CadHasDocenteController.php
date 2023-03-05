<?php

namespace App\Http\Controllers;

use App\Models\cad_has_docente;
use App\Models\docente;
use App\Models\periodo_avaliacao;
use Illuminate\Http\Request;

class CadHasdocenteController extends Controller
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
        $periodoAvaliacao = periodo_avaliacao::all();
        $docentes = docente::all();
        return json_encode([$docentes, $periodoAvaliacao]);
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
     * @param  \App\Models\cad_has_docente  $cad_has_docente
     * @return \Illuminate\Http\Response
     */
    public function show(cad_has_docente $cad_has_docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\cad_has_docente  $cad_has_docente
     * @return \Illuminate\Http\Response
     */
    public function edit(cad_has_docente $cad_has_docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\cad_has_docente  $cad_has_docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cad_has_docente $cad_has_docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\cad_has_docente  $cad_has_docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(cad_has_docente $cad_has_docente)
    {
        //
    }
}
