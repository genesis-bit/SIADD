<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\avaliacao_has_docente;
use App\Models\docente;
use App\Models\documento_comprovante;
use App\Models\indicador;
use App\Models\periodo_avaliacao;
use Exception;
use Illuminate\Http\Request;

class AvaliacaoHasDocenteController extends Controller
{
    public function index(){

        return avaliacao_has_docente::with(['docente','indicador','estadoResposta'])->get();
    }
   public function create(){
        $docente = docente::all();
        $periodoAvaliacao = periodo_avaliacao::all();
        $indicador = indicador::all();
        return [$docente,$periodoAvaliacao,$indicador];
   } 

   public function TotalPorParametro(){
        $ResultadoParametro = avaliacao_has_docente::join('indicador','avaliacao_has_docente.indicador_id', '=', 'indicador.id')
        ->join('parametro','parametro.id','=', 'indicador.parametro_id')
        //->where('avaliacao_has_docente.docente_id','=',1)
        //->where('avaliacao_has_docente.periodo_avaliacao_id','=',2)
        ->where('avaliacao_has_docente.estado_resposta_id','=',1)
        ->select('parametro.dimensao_id as dimensao','parametro.id as parametro','avaliacao_has_docente.docente_id',DB::raw('SUM(indicador.pontuacao + parametro.peso) as TotalParametro'))
        ->groupBy(['parametro.id','avaliacao_has_docente.docente_id','parametro.dimensao_id'])
        ->orderBy('avaliacao_has_docente.docente_id')
        ->get();
        return $ResultadoParametro;
   }
   
   public function store(request $request){
        $avaliacao = new avaliacao_has_docente();
        $avaliacao->docente_id = $request->docente_id;
        $avaliacao->periodo_avaliacao_id = $request->periodo_avaliacao_id;
        $avaliacao->indicador_id = $request->indicador_id;
        $avaliacao->documento_comprovante_id = $request->documento_comprovante_id==0?NULL:$request->documento_comprovante_id;
        $avaliacao->resposta = $request->resposta;
        //estado_cad_id é por defeito 1(em analisé)
        return $avaliacao->save()>0?"Adicionado com sucesso":"Erro ao Adicionar";
   }
   public function update(request $request,$id){
    try{
        $avaliacao = avaliacao_has_docente::findOrFail($id);
        $avaliacao->indicador_id = $request->indicador_id;
        $avaliacao->documento_comprovante_id = $request->documento_comprovante_id==0?NULL:$request->documento_comprovante_id;
        $avaliacao->resposta = $request->resposta;
        //estado_cad_id é por defeito 1(em analisé)
        return $avaliacao->update()>0?"Atualizado com sucesso":"Erro ao Atualizar";
    }
    catch(Exception $e){
        return $e->getMessage();
    }
}
   public function show($id)
   {
       try{
           return avaliacao_has_docente::findOrFail($id);
       }catch(Exception $e){
           return $e->getMessage();
       }
       
   }
   public function destroy($id){
    try{
        $avaliacao = avaliacao_has_docente::findOrFail($id);
        return $avaliacao->delete()>0?"Apagado com sucesso":"Erro ao Apagar";
    }
    catch(Exception $e){
        return $e->getMessage();
    }
   }
}
/*

docente_id	
periodo_avaliacao_id	
indicador_id	
documento_comprovante_id	
resposta	
estado_resposta_id	*/
  /*  SELECT SUM(indicador.pontuacao), parametro.descricao, avaliacao_has_docente.docente_id
from avaliacao_has_docente INNER JOIN indicador on avaliacao_has_docente.indicador_id = indicador.id
INNER JOIN parametro on parametro.id= indicador.parametro_id
where avaliacao_has_docente.docente_id= 1
GROUP BY(parametro.descricao);-------Resultado por Parametro*/