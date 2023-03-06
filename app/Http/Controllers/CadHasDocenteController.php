<?php

namespace App\Http\Controllers;

use App\Models\cad_has_docente;
use App\Models\docente;
use App\Models\estado_cad;
use App\Models\cad;
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
        return cad_has_docente::with(['Docente','Cad','estadoCad'])->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cad = cad::all();
        $docentes = docente::all();
        $estadoCad = estado_cad::all();
        return json_encode([$docentes, $cad, $estadoCad]);
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
        $membroCad = new cad_has_docente();
        $membroCad->cad_id = $request->cad_id;
        $membroCad->docente_id = $request->docente_id;
        $membroCad->estado_cad_id = $request->estado_cad_id;
        return $membroCad->save()>0?"Salvo com sucesso":"Erro ao Salvar";
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
        $mc = cad_has_docente::where('cad_id','=',1)->where('docente_id','=',1)->get();
        $mc->estado_cad_id = 2;
        return $mc->save();
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
