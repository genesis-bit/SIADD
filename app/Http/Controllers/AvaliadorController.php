<?php

namespace App\Http\Controllers;

use App\Models\avaliador;
use App\Models\cad;
use App\Models\cad_has_docente;
use App\Models\docente;
use Illuminate\Http\Request;

class AvaliadorController extends Controller
{
   public function index(){
        $avaliadores = avaliador::with(['Docente','Avaliador1','Avaliador2'])->get();
        return $avaliadores;
   }
   public function store(request $request){
      $avaliador = new avaliador();
      $avaliador->docente_id = $request->docente_id;
      $avaliador->avaliador1_id = $request->avaliador1_id;
      $avaliador->avaliador2_id = $request->avaliador2_id;
      return $avaliador->save()>0?"Salvo com sucesso":"Erro ao salvar";
   }
   public function create(){
      $DocentesCad = cad::where('id','=',1)->with('DocenteCad')->get();
      $idDocente = cad_has_docente::where('cad_id','=',1)->select("docente_id")->get();
      $Docente = docente::whereNotIn('id',$idDocente)->get();
      return [$DocentesCad,$Docente];
   }
}
