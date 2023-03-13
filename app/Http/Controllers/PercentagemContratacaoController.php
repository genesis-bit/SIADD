<?php

namespace App\Http\Controllers;

use App\Models\percentagem_contratacao;
use Illuminate\Http\Request;
use Exception;

class PercentagemContratacaoController extends Controller
{
    public function index(){
        try{
            return percentagem_contratacao::all();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
    }

    public function show($id){
        try{
            return percentagem_contratacao::findOrFail($id);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
        
    }

    public function store(Request $request){
        try{
                $percentagem_contratacao = new percentagem_contratacao;
                $percentagem_contratacao->descricao = $request->descricao;
                $percentagem_contratacao->percentagem = $request->percentagem;
                $percentagem_contratacao->timestamps = false;           
                return $percentagem_contratacao->save()>0? response()->json("Salvo com sucesso", 201):""; 

        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
      
    }

    public function update(Request $request, $id){
        try{
            $percentagem_contratacao = percentagem_contratacao::findOrFail($id);
            $percentagem_contratacao->descricao = $request->descricao;
            $percentagem_contratacao->percentagem = $request->percentagem;
            return $percentagem_contratacao->update()>0? response()->json("atualizado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
         
    }

    public function destroy($id){
        try{
            $percentagem_contratacao = percentagem_contratacao::findOrFail($id);
            return $percentagem_contratacao->delete()>0? response()->json("Deletado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
        
    }
    
}
