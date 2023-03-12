<?php

namespace App\Http\Controllers;

use App\Models\turma;
use Illuminate\Http\Request;
use Exception;

class TurmaController extends Controller
{
   
    public function index()
    {
        return turma::all();
    }

    
   
    public function store(Request $request)
    {
        $Turma=new turma;
        $Turma->descricao= $request->descricao;
        $Turma->curso_id = $request->curso_id;
        $Turma->ano_lectivo_id= $request->ano_lectivo_id;
        $Turma->ano_academico_id = $request->ano_academico_id;
        $Turma->semestre_id = $request->semestre_id;
        return $Turma->save()>0?"Salvo com sucesso":"Erro ao salvar";
        //codTurma	curso_id	ano_lectivo_id	ano_academico_id	semestre_id	    
    }

    
    public function show(turma $id)
    {
        try{
            return turma::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

   
    public function update(Request $request, $id)
    {
        try{
            $Turma=turma::findOrFail($id);
            $Turma->descricao = $request->descricao;
            return $Turma->update()>0?"Atualizado com sucesso":"erro ao atualizar";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

   
    public function destroy($id)
    {
        try{
            $Turma=turma::findOrFail($id);
            $Turma->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }
}
