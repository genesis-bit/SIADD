<?php

namespace App\Http\Controllers;

use App\Models\cad;
use Illuminate\Http\Request;

class CadController extends Controller
{
    public function index(){
        return cad::all();
    }

    public function show($id){
        try{
            return cad::findOrFail($id);
        }catch(Exception $e){
            return $e->getMassage();
        }
        
    }

    public function store(Request $request){
        $Cad = new cad;
        $Cad->descricao = $request->descricao;
        $Cad->save();
    }

    public function update(Request $request, $id){
        try{
            $Cad = cad::findOrFail($id);
            $Cad->descricao = $request->descricao;
            $Cad->update()>0?"Atualizado com sucesso":"erro ao atualizar";

        }catch(Exception $e){
            return $e->getMessage();
            
        }
        
    }

    public function destroy($id){
        try{
            $Cad = cad::findOrFail($id);
            $Cad->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
