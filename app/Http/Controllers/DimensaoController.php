<?php

namespace App\Http\Controllers;

use App\Models\dimensao;
use App\Models\parametro;
use Exception;
use Illuminate\Http\Request;

class DimensaoController extends Controller
{
    
    public function index()
    {
        try{
            return dimensao::all();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
     
    }
    public function store(Request $request){
        try{
                $dimensao = new dimensao;
                $dimensao->descricao = $request->descricao;
                $dimensao->peso = $request->peso;
                $dimensao->timestamps = false;           
                return $dimensao->save()>0? response()->json("Salvo com sucesso", 201):""; 

        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
      
    }
    public function update(Request $request, $id){
        try{
            $dimensao = dimensao::findOrFail($id);
            $dimensao->descricao = $request->descricao;
            $dimensao->peso = $request->peso;
            $dimensao->timestamps = false;
            return $dimensao->update()>0? response()->json("atualizado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
         
    }

   
    
}
