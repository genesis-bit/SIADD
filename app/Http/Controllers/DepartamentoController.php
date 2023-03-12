<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use Illuminate\Http\Request;
use Exception;

class DepartamentoController extends Controller
{
    
    public function index()
    {
        return departamento::all();
    }

    
    public function store(Request $request)
    {
        try{
            $Departamento = new departamento;
            $Departamento->descricao = $request->descricao;
            $Departamento->timestamps = false;
            return $Departamento->save()>0?response()->json("Salvo com sucesso", 201):""; ; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
       
    }

    
    public function show($id)
    {
        try{
            return departamento::findOrFail($id);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        
        
    }

    
    public function update(Request $request, $id)
    {
        try{
            $Departamento = departamento::findOrFail($id);
            $Departamento->descricao = $request->descricao;
            $Departamento->timestamps = false;
            return $Departamento->update()>0?response()->json("Atualizado com sucesso", 200):""; ; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 200);
        }
       
    }

    
    public function destroy($id)
    {
        try{
            $Departamento = departamento::findOrFail($id);
            return $Departamento->delete()>0?response()->json("Deletado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
       
    }
}
