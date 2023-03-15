<?php

namespace App\Http\Controllers;

use App\Models\turma_has_curso;
use Exception;
use Illuminate\Http\Request;

class TurmaHasCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return turma_has_curso::all();
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
        try{
            $ExisteTurma = turma_has_curso::where('turma_id','=',$request->turma_id)->where('curso_id','=',$request->curso_id)
            ->where('ano_lectivo_id','=',$request->ano_lectivo_id)->where('ano_academico_id','=',$request->ano_academico_id)
            ->where('semestre_id','=',$request->semestre_id)->doesntExist();
            if($ExisteTurma){
                $Turma = new turma_has_curso;
                $Turma->turma_id = $request->turma_id;
                $Turma->curso_id = $request->curso_id;
                $Turma->ano_lectivo_id= $request->ano_lectivo_id;
                $Turma->ano_academico_id = $request->ano_academico_id;
                $Turma->semestre_id = $request->semestre_id;
                return $Turma->save() > 0 ?response()->json("Adicionado com sucesso",201):"";
            }
            else{
                return response()->json("Turma já existente",400);
            }
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\turma_has_curso  $turma_has_curso
     * @return \Illuminate\Http\Response
     */
    public function show(turma_has_curso $turma_has_curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\turma_has_curso  $turma_has_curso
     * @return \Illuminate\Http\Response
     */
    public function edit(turma_has_curso $turma_has_curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\turma_has_curso  $turma_has_curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, turma_has_curso $turma_has_curso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\turma_has_curso  $turma_has_curso
     * @return \Illuminate\Http\Response
     */
    public function destroy(turma_has_curso $turma_has_curso)
    {
        //
    }
}
