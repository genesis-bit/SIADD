<?php

namespace App\Http\Controllers;

use App\Models\turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
   
    public function index()
    {
        return turma::all();
    }

    
   
    public function store(Request $request)
    {
        $Turma=new turma;

        $Turma->descricao= $request->desc;
        $Turma->save();
        
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
            $Turma->update()>0?"Atualizado com sucesso":"erro ao atualizar";
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
