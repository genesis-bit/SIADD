<?php

namespace App\Http\Controllers;

use App\Models\unidade_organica;
use Illuminate\Http\Request;
use Exception;

class UnidadeOrganicaController extends Controller
{
    
    public function index()
    {
        return unidade_organica::all();
    }

    
    
    public function store(Request $request)
    {
        try{
            $Unidade = new unidade_organica;
            $Unidade->descricao = $request->descricao;
            $Unidade->timestamps= false;
            return $Unidade->save()>0? response()->json("Adicionado com suceso", 201):"";
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        
    }

    
    public function show($id)
    {
        try{
            return unidade_organica::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    
    
    
    public function update(request $request, $id)
    {
        try{
            $Unidade = unidade_organica::findOrFail($id);
            $Unidade->descricao = $request->descricao;
            $Unidade->timestamps= false;
            return  $Unidade->update()>0? response()->json("Atualizado com sucesso", 200):"";
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        
    }

   
    public function destroy($id)
    {
        try{
            $Unidade = unidade_organica::findOrFail($id);
            return  $Unidade->delete()>0? response()->json("Deletado com sucesso", 200):"";
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
       
    }
}
