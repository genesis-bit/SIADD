<?php

namespace App\Http\Controllers;

use App\Models\turma_has_docente;
use Exception;
use Illuminate\Http\Request;

class TurmaHasDocenteController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //turma_id	docente_id
        try{
            $turmaDocente = new turma_has_docente();
            $turmaDocente->turma_id = $request->turma_id;
            $turmaDocente->docente_id = $request->docente_id;
            return $turmaDocente->save()>0?response()->json("Adicionado com sucesso", 201):"";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\turma_has_docente  $turma_has_docente
     * @return \Illuminate\Http\Response
     */
    public function show(turma_has_docente $turma_has_docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\turma_has_docente  $turma_has_docente
     * @return \Illuminate\Http\Response
     */
    public function edit(turma_has_docente $turma_has_docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\turma_has_docente  $turma_has_docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, turma_has_docente $turma_has_docente)
    {
        try{
            $turmaDocente = $turma_has_docente;
            return $turmaDocente;
            //$turmaDocente->turma_id = $request->turma_id;
            //$turmaDocente->docente_id = $request->docente_id;
            //return $turmaDocente->save()>0?response()->json("Adicionado com sucesso", 201);
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\turma_has_docente  $turma_has_docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(turma_has_docente $turma_has_docente)
    {
        //
    }
}
