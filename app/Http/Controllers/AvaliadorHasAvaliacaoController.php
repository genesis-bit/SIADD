<?php

namespace App\Http\Controllers;

use App\Models\avaliacao_has_docente;
use App\Models\avaliador_has_avaliacao;
use Illuminate\Http\Request;

class AvaliadorHasAvaliacaoController extends Controller
{
    public function store(request $request){
        //avaliador_id	avaliacao_id	estado_resposta_id
        $validar = new avaliador_has_avaliacao();
        $validar->avaliador_id = $request->avaliador_id;
        $validar->avaliacao_id = $request->avaliacao_id;
        $validar->estado_resposta_id = $request->estado_resposta_id;
        if($validar->save()){
            avaliacao_has_docente::where('id','=',$request->avaliacao_id)->update(['estado_resposta_id'=>$request->estado_resposta_id]);
            return "Validação feita com sucesso";
        }
        return "Erro ao validar";
    }
    public function update(request $request, $id){
        //avaliador_id	avaliacao_id	estado_resposta_id
        $validar = new avaliador_has_avaliacao();
        $validar->avaliador_id = $request->avaliador_id;
        $validar->avaliacao_id = $request->avaliacao_id;
        $validar->estado_resposta_id = $request->estado_resposta_id;
        if($validar->save()){
            avaliacao_has_docente::where('id','=',$request->avaliacao_id)->update(['estado_resposta_id'=>$request->estado_resposta_id]);
            return "Validação feita com sucesso";
        }
        return "Erro ao validar";
    }
}
