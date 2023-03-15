<?php

namespace App\Http\Controllers;

use App\Models\turma_has_estudante;
use Illuminate\Http\Request;
use Exception;

class TurmaHasEstudanteController extends Controller
{
   
    public function store(Request $request)
    {
        //turma_id	docente_id
        try{
            $turmaEstudante = new turma_has_estudante();
            $turmaEstudante->turma_id = $request->turma_id;
            $turmaEstudante->estudante_id = $request->estudante_id;
            return $turmaEstudante->save()>0?response()->json("Adicionado com sucesso", 201):"";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }
}
