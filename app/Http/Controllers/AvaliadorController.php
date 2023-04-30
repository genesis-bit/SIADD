<?php

namespace App\Http\Controllers;

use App\Models\avaliador;
use App\Models\cad;
use App\Models\cad_has_docente;
use App\Models\docente;
use Exception;
use Illuminate\Http\Request;

class AvaliadorController extends Controller
{
   public function index(){
      try{
        return avaliador::with(['Docente','Avaliador'])->get();
      }
      catch(Exception $e){
         return response()->json($e->getMessage(),400);
      }      
   }
   public function docentesAvaliador($avaliador_id){  //retorna todos os docentes que podem ser avaliados por um avaliador
      try{
         return avaliador::where('avaliador_id','=',$avaliador_id)->with('Docente')->select('docente_id')->get();
      }
      catch(Exception $e){
         return response()->json($e->getMessage(),400);
      }
   }
   public function store(request $request){
      try{
         $avaliador = new avaliador();
         $avaliador->docente_id = $request->docente_id;
         $avaliador->avaliador_id = $request->avaliador_id;
         $cad = cad::where('ativo','=',1)->first();
         $avaliador->cad_id = $cad->id;
         return $avaliador->save()>0?response()->json("Salvo com sucesso",201):"Erro ao salvar";
      }
      catch(Exception $e){
         return response()->json($e->getMessage(),400);
      }
   
   }

}
