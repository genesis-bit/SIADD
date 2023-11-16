<?php

namespace App\Http\Controllers;

use App\Models\turma_has_curso;
use App\Models\turma_has_estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Exception;

class TurmaHasEstudanteController extends Controller
{
    public function index(){
        $t = turma_has_curso::where('turma_id','=',2)->where('curso_id','=',2)
        ->where('ano_lectivo_id','=',1)->where('ano_academico_id','=',2)
        ->where('semestre_id','=',1)->select('id')->first();
        return ($t == null)?"Sem dados":$t;
    }
   
    public function store(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'turma_id' => 'required','curso_id' => 'required',
                'ano_lectivo_id'=>'required','ano_academico_id'=>'required','semestre_id'=>'required',
                'estudante_id'=>'required']);

            $ExisteTurma = turma_has_curso::where('turma_id','=',$request->turma_id)->where('curso_id','=',$request->curso_id)
            ->where('ano_lectivo_id','=',$request->ano_lectivo_id)->where('ano_academico_id','=',$request->ano_academico_id)
            ->where('semestre_id','=',$request->semestre_id)->select('id')->first();
            $Nova=0;
            if($ExisteTurma == null){
                $Turma = new turma_has_curso;
                $Turma->turma_id = $request->turma_id;
                $Turma->curso_id = $request->curso_id;
                $Turma->ano_lectivo_id= $request->ano_lectivo_id;
                $Turma->ano_academico_id = $request->ano_academico_id;
                $Turma->semestre_id = $request->semestre_id;
                $Turma->timestamps = false;
                $Turma->save();
                $Nova = turma_has_curso::all()->last();
            }
            else{
                $Nova = $ExisteTurma;
            }

                $turmaEstudante = new turma_has_estudante();
                $turmaEstudante->turma_id = $Nova->id;
                $turmaEstudante->timestamps = false;
                $turmaEstudante->estudante_id = $request->estudante_id;
                return $turmaEstudante->save()>0?response()->json("Adicionado com sucesso", 201):"";
            
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }
}
