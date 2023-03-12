<?php

namespace App\Http\Controllers;

use App\Models\disciplina;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class DisciplinaController extends Controller
{
    public function index(){
        try{
            return disciplina::all();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
    }

    public function show($id){
        try{
            return disciplina::findOrFail($id);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
        
    }

    public function store(Request $request){
        try{
                $Disciplina = new disciplina;
                $Disciplina->descricao = $request->descricao;
                $Disciplina->timestamps = false;           
                return $Disciplina->save()>0? response()->json("Salvo com sucesso", 201):""; 

        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
      
    }

    public function update(Request $request, $id){
        try{
            $Disciplina = disciplina::findOrFail($id);
            $Disciplina->descricao = $request->descricao;
            return $Disciplina->update()>0? response()->json("atualizado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
         
    }

    public function destroy($id){
        try{
            $Disciplina = disciplina::findOrFail($id);
            return $Disciplina->delete()>0? response()->json("Deletado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
        
    }
}
