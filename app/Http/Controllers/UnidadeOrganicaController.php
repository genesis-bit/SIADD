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
        $Unidade = new unidade_organica;
        $Unidade->descricao = $request->descricao;
    }

    
    public function show($id)
    {
        try{
            return unidade_organica::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    
    
    
    public function update($id)
    {
        try{
            $Unidade = unidade_organica::findOrFail($id);
            $Unidade->descricao = $request->descricao;
            $Unidade->update()>0?"Atualizado com sucesso":"Erro ao atualizar";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

   
    public function destroy($id)
    {
        try{
            $Unidade = unidade_organica::findOrFail($id);
            $Unidade->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }
}
