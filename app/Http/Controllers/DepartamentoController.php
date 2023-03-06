<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    
    public function index()
    {
        return departamento::all();
    }

    
    public function store(Request $request)
    {
        $Departamento = new departamento;
        $Departamento->descricao = $request->descricao;
        $Departamento->save(); 
    }

    
    public function show($id)
    {
        try{
            return departamento::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
        
    }

    
    public function update(Request $request, $id)
    {
        try{
            $Departamento = departamento::findOrFail($id);
            $Departamento->descricao = $request->descricao;
            $Departamento->update()>0?"Atualizado com sucesso":"erro ao atualizar"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    
    public function destroy($id)
    {
        try{
            $Departamento = departamento::findOrFail($id);
            $Departamento->delete()>0?"Deletado com sucesso":"Nao encontrado"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }
}
