<?php

namespace App\Http\Controllers;

use App\Models\docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(){
        return docente::all();
    }

    public function show ($id){
        try{
            return docente::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function store(Request $request){
        $Docente = new docente;
        $Docente->nome_docente = $request->nome_docente;
        $Docente->numero_mecanografico = $request->n_mecanografico;
        $Docente->save();
    }
    
    public function update(Request $request, $id){
        try{
            $Docente = docente::findOrFail($id);
            $Docente->nome_docente = $request->nome_docente;
             $Docente->numero_mecanografico = $request->n_mecanografico;
            $Docente->update()>0?"Atualizado com sucesso":"Erro ao atualizar";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function destroy ($id){
        try{
            $Docente = docente::findOrFail($id);
            $Docente->delete()>0?"Deletado com sucesso":"Não Salvo";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
