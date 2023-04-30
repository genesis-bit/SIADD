<?php

namespace App\Http\Controllers;

use App\Models\estudante_has_disciplina;
use Illuminate\Http\Request;
use Exception;

class EstudanteHasDisciplinaController extends Controller
{
    public function store(Request $request)
    {
       
        try{
            $EstudanteDisciplina = new estudante_has_disciplina();
            $EstudanteDisciplina->estudante_id = $request->estudante_id;
            $EstudanteDisciplina->dis_id = $request->disciplina_id;
            return $EstudanteDisciplina->save()>0?response()->json("Adicionado com sucesso", 201):"";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }
}
