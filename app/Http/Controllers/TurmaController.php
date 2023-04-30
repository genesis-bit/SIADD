<?php

namespace App\Http\Controllers;

use App\Models\turma;
use Illuminate\Http\Request;
use Exception;

class TurmaController extends Controller
{
   
    public function index()
    {
        try{
            return turma::all();
        }catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    
   
    public function store(Request $request)
    {
        try{
             $Turma=new turma;
             $Turma->descricao= $request->descricao;
             $Turma->timestamps = false;
             return $Turma->save()>0?response()->json("Salvo com sucesso",201):"Erro ao salvar";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
        //codTurma	curso_id	ano_lectivo_id	ano_academico_id	semestre_id	    
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
