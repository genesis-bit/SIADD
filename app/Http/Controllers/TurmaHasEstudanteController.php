<?php

namespace App\Http\Controllers;

use App\Models\turma_has_curso;
use App\Models\turma_has_estudante;
use Illuminate\Http\Request;
use Exception;

class TurmaHasEstudanteController extends Controller
{
   
    public function store(Request $request)
    {
        try{
           /* $ExisteTurma = turma_has_curso::where('turma_id','=',$request->turma_id)->where('curso_id','=',$request->curso_id)
            ->where('ano_lectivo_id','=',$request->ano_lectivo_id)->where('ano_academico_id','=',$request->ano_academico_id)
            ->where('semestre_id','=',$request->semestre_id)->select('id')->first();*/

            $Turma = new turma_has_curso;
            $Turma->turma_id = $request->turma_id;
            $Turma->curso_id = $request->curso_id;
            $Turma->ano_lectivo_id= $request->ano_lectivo_id;
            $Turma->ano_academico_id = $request->ano_academico_id;
            $Turma->semestre_id = $request->semestre_id;
            $Turma->timestamps = false;

            if($Turma->save()){
                $Nova = turma_has_curso::all()->last();
                $turmaEstudante = new turma_has_estudante();
                $turmaEstudante->turma_id = $Nova->id;
                $turmaEstudante->timestamps = false;
                $turmaEstudante->estudante_id = $request->estudante_id;
                return $turmaEstudante->save()>0?response()->json("Adicionado com sucesso", 201):"";
            }
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }
}
