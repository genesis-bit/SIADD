<?php

namespace App\Http\Controllers;

use App\Models\grau_academico;
use Exception;
use Illuminate\Http\Request;

class GrauAcademicoController extends Controller
{
   
    public function index(){
        return grau_academico::all();
    }

    public function show($id){
        try{
            return grau_academico::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function store(Request $request){
        $Grau = new grau_academico;
        $Grau->descricao = $request->description;
        $Grau->save();
    }

    public function update(Request $request, $id){
        try{
            $Grau = grau_academico::findOrFail($id);
            $Grau->descricao = $request->description;
            $Grau->update()>0?"Atualizado com sucesso":"erro ao atualizar";
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    public function destroy($id){
        try{
            $Grau = grau_academico::findOrFail($id);
            $Grau->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
