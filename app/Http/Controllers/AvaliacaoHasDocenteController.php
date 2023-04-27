<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\avaliacao_has_docente;
use App\Models\cad_has_docente;
use App\Models\docente;
use App\Models\cad;
use App\Models\documento_comprovante;
use App\Models\indicador;
use App\Models\dimensao;
use App\Models\periodo_avaliacao;
use Exception;
use Faker\Core\Number;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AvaliacaoHasDocenteController extends Controller
{
    public function index(){
        return $this->ResultadoFinal(2,1);
        //Storage::setVisibility('Romilde Ramos/0TJcUEcZqqMNWC9L0HxZwDtlXXxI7zGsU6geWaoU.png', 'private');
        //return Storage::path('documento.pdf');
        //return request()->server('HTTP_HOST').
        //"".Storage::url('Romilde Ramos/0TJcUEcZqqMNWC9L0HxZwDtlXXxI7zGsU6geWaoU.png');
        //return avaliacao_has_docente::with(['docente','indicador','estadoResposta'])->get();    
    }

    public function __construct() {
       // $this->middleware('auth:api');
    }
    public function validaravaliacao(request $request){
        try{
            $avaliacao = avaliacao_has_docente::findOrFail($request->id);
            $avaliacao->estado_resposta_id = $request->estado_resposta_id;
            $avaliacao->avaliador_id = $request->avaliador_id;
            return $avaliacao->update()>0?response()->json("Validado com sucesso", 200):"";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }


   public function TotalPorParametro($idProfessor,$periodoavaliacao){
    //Busca da ultima avaliação de um professor
    
    $buscarperiodo = avaliacao_has_docente::where('docente_id','=',$idProfessor)
            ->select(DB::raw('MAX(periodo_avaliacao_id) as Periodo'))->first();
    $periodo_id = $periodoavaliacao==0?$buscarperiodo->Periodo:$periodoavaliacao;
    
       
        $ResultadoParametro = avaliacao_has_docente::join('indicador','avaliacao_has_docente.indicador_id', '=', 'indicador.id')
        ->join('parametro','parametro.id','=', 'indicador.parametro_id')
        ->where('avaliacao_has_docente.docente_id','=',$idProfessor)
        ->where('avaliacao_has_docente.periodo_avaliacao_id','=',$periodo_id)
        ->where('avaliacao_has_docente.estado_resposta_id','=',2)
        ->select('parametro.dimensao_id as dimensao','parametro.id as parametro','avaliacao_has_docente.docente_id',DB::raw('SUM(indicador.pontuacao * parametro.peso) as TotalParametro'))
        ->groupBy(['parametro.id','avaliacao_has_docente.docente_id','parametro.dimensao_id'])
        ->orderBy('avaliacao_has_docente.docente_id')
        ->get();
        return $ResultadoParametro;
   }

   public function TotalPorDimensao($idProfessor,$periodoavaliacao){
            $dimensao = ["docente_id"=>0,"dimensao1"=>0,"dimensao2"=>0,"dimensao3"=>0,"dimensao4"=>0];                
            $TotalParametros = $this->TotalPorParametro($idProfessor,$periodoavaliacao);
            $dimensao["docente_id"] = $TotalParametros[0]["docente_id"];
            foreach($TotalParametros as $dados){
                switch($dados["dimensao"]){
                    case (1):
                        $dimensao["dimensao1"] += $dados["TotalParametro"];
                        break;
                    case (2):
                        $dimensao["dimensao2"] += $dados["TotalParametro"];
                        break;
                    case (3):
                        $dimensao["dimensao3"] += $dados["TotalParametro"];
                        break;
                    case (4):
                        $dimensao["dimensao4"] += $dados["TotalParametro"];
                        break;
                    
                }
            }
            return $dimensao;
   }
   public function ResultadoDocente($idProfessor){
    try{
        return $this->ResultadoFinal($idProfessor,0);
    }
    catch(Exception $e){
        $docente = docente::where("id","=",$idProfessor)
            ->with(["UnidadeOrganica","Percentagem","Categoria","GrauAcademico","Cargo", "Departamento"])->first();
        return ["estado"=>"","valor"=>0,"docente"=>$docente];
    }
   }
   public function ResultadoFinal($idProfessor,$periodoavaliacao){
    try{
            $CF = ["estado"=>"", "valor"=>0];
            $CF["docente"] = docente::where("id","=",$idProfessor)
            ->with(["UnidadeOrganica","Percentagem","Categoria","GrauAcademico","Cargo", "Departamento"])->first();

            $pesosDimensao = dimensao::get("peso");
            $dimensao = $this->TotalPorDimensao($idProfessor,$periodoavaliacao);

            $CF["valor"] = $dimensao["dimensao1"]*$pesosDimensao[0]["peso"] + $dimensao["dimensao2"]*$pesosDimensao[1]["peso"] + 
            $dimensao["dimensao3"]*$pesosDimensao[2]["peso"] + $dimensao["dimensao4"]*$pesosDimensao[3]["peso"];

                switch($CF["valor"]){
                    case $CF["valor"] < 30 :
                        $CF["estado"] = "Inadequado";
                        break;
                    case $CF["valor"] >= 30 && $CF["valor"] < 50:
                        $CF["estado"] = "Suficiente";
                        break;
                    case $CF["valor"] >= 50 && $CF["valor"] < 80:
                        $CF["estado"] = "Bom";
                        break;
                    case $CF["valor"] >= 80 && $CF["Valor"] < 100:
                        $CF["estado"] = "Muito bom";
                        break;
                    default:
                        $CF["estado"] = "Excelente";
                        break;
                }

            return $CF;
    }
    catch(Exception $e){
        return $CF;
        //return response()->json($e->getMessage(),400);
    }

   }
   public function ClassificacaoGeral(){
        $Resultado = collect([]);
        $IdDocente = avaliacao_has_docente::select("docente_id")->distinct()->get();
        foreach($IdDocente as $id){
            $Resultado->push($this->ResultadoFinal($id["docente_id"],0));
        }

        return $Resultado;
   } 
   
   public function HistoricoPeriodo(){
        $periodoA = periodo_avaliacao::get();
        $total = collect([]);   
        foreach($periodoA as $p){
            $aptos=0;
            $naptos=0;
            $docAvaliados = avaliacao_has_docente::where('periodo_avaliacao_id','=',$p->id)
                ->select("docente_id")->distinct()->get();
            //return $docAvaliados;
                foreach($docAvaliados as $da){
                   $dados = $this->ResultadoFinal($da->docente_id,$p->id);                     
                   if($dados['valor'] >= 50){
                        $aptos = $aptos + 1;                        
                   }
                   else{
                    $naptos = $naptos + 1;
                   }
                }
            $total->push(["periodo"=>$p,"Aprovados"=>$aptos,"Reprovados"=>$naptos]);
        }
        return $total;
   }
   public function store(request $request){
        try{
            // Validação do avaliado e do cad!
           // $DocentenoCad = cad_has_docente::where('docente_id','=',$request->docente_id)
            //Tenho de verificar o cad ativo!
             //   ->where('periodo_avaliacao_id','=',$this->cadAtivo())
               // ->get();
           // if($DocentenoCad->isNotEmpty())
             //   return response()->json("Docente pertencente ao Cad, não pode ser avaliado",400);
            
            //------------------------------------------------
            //$idPeriodoAtivo = cad::where('ativo','=',1)->select('periodo_avaliacao_id')->get();
            //$file = $request->file('documento_comprovante')->store('public');
            $nomeDocente = docente::find($request->docente_id);
            $avaliacao = new avaliacao_has_docente;
           
            $avaliacao->docente_id = $request->docente_id;
            $avaliacao->periodo_avaliacao_id = $this->cadAtivo();
            $avaliacao->indicador_id = $request->indicador_id;
           
            $avaliacao->documento_comprovante = $request->file('documento_comprovante')->store($nomeDocente->nome_docente);
            $avaliacao->resposta = $request->resposta;
           //estado_cad_id é por defeito 1(em analisé)
            return $avaliacao->save()>0?response()->json("Adicionado com sucesso",201):"";
           // return response()->json(($file),200);
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
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
        return response()->json($e->getMessage(), 400);
    }
}

   public function destroy($id){
        try{
            $avaliacao = avaliacao_has_docente::findOrFail($id);
            return $avaliacao->delete()>0?response()->json("Apagado com sucesso",200):"Erro ao Apagar";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
   }

   public function historicoProfessor($idProfessor){
        $Resultado = collect([]);
        $pesosDimensao = dimensao::get("peso");
        $Periodo = avaliacao_has_docente::where('docente_id','=',$idProfessor)->select("periodo_avaliacao_id")->distinct()->get();
        foreach($Periodo as $id){
            $dimensao = $this->TotalPorDimensao($idProfessor,$id->periodo_avaliacao_id);
            $CF = $dimensao["dimensao1"]*$pesosDimensao[0]["peso"] + $dimensao["dimensao2"]*$pesosDimensao[1]["peso"] + 
                $dimensao["dimensao3"]*$pesosDimensao[2]["peso"] + $dimensao["dimensao4"]*$pesosDimensao[3]["peso"];
            $Resultado->push(["Periodo"=>$id->periodo_avaliacao_id,"Pontuacao"=>$CF]);
        }
        

        return $Resultado;
   }

   public function respostasDocente($docente_id){
        try{
            $cadAtivo = $this->cadAtivo();
            return avaliacao_has_docente::where('docente_id','=',$docente_id)->where('periodo_avaliacao_id','=',$cadAtivo)
                ->with(['indicador', 'estadoresposta'])->get();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
   }
   public function cadAtivo(){
        $cadAtivo = cad::where('ativo','=',1)->select('periodo_avaliacao_id as periodo')->first();
        return $cadAtivo->periodo;
}
   
}
/*
request()->server('HTTP_HOST');
docente_id	
periodo_avaliacao_id	
indicador_id	
documento_comprovante_id	
resposta	
estado_resposta_id	*/
  /*          SELECT SUM(indicador.pontuacao * parametro.peso) as total, parametro.descricao, avaliacao_has_docente.docente_id
			from avaliacao_has_docente INNER JOIN indicador on avaliacao_has_docente.indicador_id = indicador.id
				INNER JOIN parametro on parametro.id = indicador.parametro_id
			where avaliacao_has_docente.docente_id = 2 and
             avaliacao_has_docente.periodo_avaliacao_id = 1 and 
             avaliacao_has_docente.estado_resposta_id = 1             
GROUP BY(parametro.descricao);*/