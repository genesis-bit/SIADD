<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\Request;
use Exception;

class CargoController extends Controller
{
    
    public function index()
    {
        return cargo::all();
    }

    
   
    public function store(Request $request)
    {
        try{
            $Cargo = new cargo;
            $Cargo->descricao = $request->descricao;
            $Cargo->timestamps = false;
            return $Cargo->save()>0?response()->json(null, 201):"Erro ao Salvar";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
        
    }

    
    public function show($id)
    {
        try{
            return cargo::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
   
    }

   
    
    public function update(Request $request, $id)
    {
        try{
            $Cargo = cargo::findOrFail($id);
            $Cargo->descricao = $request->descricao;
            return $Cargo->update()>0?"Atualizado":"erro ao atualizar";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
        
    }

    
    public function destroy($id)
    {
        try{
            $Cargo = cargo::findOrFail($id);
            return $Cargo->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
        
    }
}
