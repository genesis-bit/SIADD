<?php

namespace App\Http\Controllers;

use App\Models\disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index(){
        return disciplina::all();
    }

    public function show($id){
        try{
            return disciplina::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function store(Request $request){
        $Disciplina = new disciplina;
        $Disciplina->descricao = $request->descricao;
        $Disciplina->save();  
    }

    public function update(Request $request, $id){
        try{
            $Disciplina = disciplina::findOrFail($id);
            $Disciplina->descricao = $request->descricao;
            $Disciplina->update()>0?"atualizado com sucesso":"erro ao atualizar"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
         
    }

    public function destroy($id){
        try{
            $Disciplina = disciplina::findOrFail($id);
            $Disciplina->delete()>0?"Deletado com sucesso":"Nao encontrado"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
