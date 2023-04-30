<?php

namespace App\Http\Controllers;

use App\Models\turma_has_curso;
use App\Models\turma_has_docente;
use Exception;
use Illuminate\Http\Request;

class TurmaHasCursoController extends Controller
{
  
    public function index()
    {
        try{
            return turma_has_curso::with('Docente')->get();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }        
    }

    /**
     * Show the form for creating a new resource.
     *
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
    
    public function turmaDocente($id){
        $IdTurma = turma_has_docente::where('docente_id','=',$id)->get('turma_id');
        $turmas = turma_has_curso::whereIn('id',$IdTurma)
            ->with(['turma','curso','anoacademico','anoletivo','semestre'])->get();
        return $turmas;
    }

}
