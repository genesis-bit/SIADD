<?php

namespace App\Http\Controllers;

use App\Models\periodo_avaliacao;
use Illuminate\Http\Request;

class PeriodoAvaliacaoController extends Controller
{

    public function index(){
        return periodo_avaliaco::all();

    }

    public function show($id){
        return periodo_avaliacao::findOrFail($id);
    }

    public function store(Request $request){
        $periodo = new periodo_avaliacao;
        $periodo->descricao = $request->descricao;
        $periodo->save();
    }

    public function update(Request $request, $id){
        $periodo =  periodo_avaliacao::findOrFail($id);
        $periodo->descricao = $request->descricao;
        $periodo->update();
    }

    public function destroy($id){

    $periodo = periodo_avaliacao::findOrFail($id);
    $periodo->delete();
}


    
}
