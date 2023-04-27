<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\funcao;
use Exception;

class funcaoController extends Controller
{
    public function index(){
        try{
            return funcao::all();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
    }

    public function show($id){
        try{
            return funcao::findOrFail($id);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
        
    }

    public function store(Request $request){
        try{
                $funcao = new funcao;
                $funcao->descricao = $request->descricao;
                $funcao->timestamps = false;           
                return $funcao->save()>0? response()->json("Salvo com sucesso", 201):""; 

        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
      
    }

    public function update(Request $request, $id){
        try{
            $funcao = funcao::findOrFail($id);
            $funcao->descricao = $request->descricao;
            return $funcao->update()>0? response()->json("atualizado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
         
    }

    public function destroy($id){
        try{
            $funcao = funcao::findOrFail($id);
            return $funcao->delete()>0? response()->json("Deletado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
        
    }
}
