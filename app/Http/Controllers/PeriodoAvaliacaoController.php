<?php

namespace App\Http\Controllers;

use App\Models\periodo_avaliacao;
use Exception;
use Illuminate\Http\Request;

class PeriodoAvaliacaoController extends Controller
{

    public function index(){
        return periodo_avaliacao::all();

    }

    public function show($id){
        try{
            return periodo_avaliacao::findOrFail($id);
        }
        catch(Exception $e){
            return $e->getMessage();
        }
        
    }


    public function store(Request $request){
        $periodo = new periodo_avaliacao;
        $periodo->descricao = $request->descricao;
        $periodo->timestamps = false;
        if($periodo->save())
            return "Salvo com suceso";
        return "Erro";
    }

    public function update(Request $request, $id){
        try{
            $periodo = periodo_avaliacao::findOrFail($id);
            $periodo->descricao = $request->descricao;
            $periodo->timestamps = false;
            return $periodo->update()>0?"Atualização feita com sucesso":"Erro ao atualizar";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
       
    }

    public function destroy($id){
        try{
            $periodo = periodo_avaliacao::findOrFail($id);
            return $periodo->delete()>0?"Deletado com sucesso":"Não salvo";
        }
        catch(Exception $e){
            return $e->getMessage();
        }
  
}


    
}
