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
            return response()->json($e->getMessage(),400);
        }
        
    }

    public function store(Request $request){
        try{
        $Grau = new grau_academico;
        $Grau->descricao = $request->descricao;
        $Grau->timestamps = false;
        return $Grau->save()>0?response()->json("Salvo com sucesso",201):"Erro ao Salvar";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    public function update(Request $request, $id){
        try{
            $Grau = grau_academico::findOrFail($id);
            $Grau->descricao = $request->description;
            return $Grau->update()>0?"Atualizado com sucesso":"erro ao atualizar";
        }catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
       
    }

    public function destroy($id){
        try{
            $Grau = grau_academico::findOrFail($id);
            $Grau->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
        
    }
}
