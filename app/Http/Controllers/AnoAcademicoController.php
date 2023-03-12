<?php

namespace App\Http\Controllers;

use App\Models\ano_academico;
use Illuminate\Http\Request;
use Exception;

class AnoAcademicoController extends Controller
{
    public function index()
    {
        return ano_academico::all();
        
    }

    

    
    public function store(Request $request)
    {
        $anoAcademico = new ano_academico;
        $anoAcademico->descricao = $request->descricao;
        return $anoAcademico->save()>0?"Salvo com sucesso":"Erro ao Salvar";
    }

    
    public function show($id)
    {
        try{
            return ano_academico::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    
    public function update(Request $request, $id)
    {
        try{
            $anoAcademico = ano_academico::findOrFail($id);
            $anoAcademico->descricao = $request->descricao;
            return $anoAcademico->update()>0?"Atualizado com sucesso":"erro ao atualizar"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    
    public function destroy($id)
    {
        try{
            $anoAcademico = ano_academico::findOrFail($id);
            return $anoAcademico->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
   
    
    