<?php

namespace App\Http\Controllers;

use App\Models\docente_has_disciplina;
use Illuminate\Http\Request;
use Exception;

class DocenteHasDisciplinaController extends Controller
{
    public function store(Request $request)
    {
       
        try{
            $DocenteDisciplina = new docente_has_disciplina();
            $DocenteDisciplina->docente_id = $request->docente_id;
            $DocenteDisciplina->dis_id = $request->disciplina_id;
            return $DocenteDisciplina->save()>0?response()->json("Adicionado com sucesso", 201):"";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }  
}
