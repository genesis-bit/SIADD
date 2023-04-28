<?php

namespace App\Http\Controllers;

use App\Models\dimensao;
use App\Models\parametro;
use Illuminate\Http\Request;
use Exception;

class ParametroController extends Controller
{
   
    public function dimensaoParametro($iddimensao)
    {
        $dim = dimensao::where('id','=',$iddimensao)->get();
       // $var = collect([]);
      
         $v =["dimensao"=>$dim[0],"parametros"=>$this->parametrosIndicadores($iddimensao)];
         /*
        foreach($dim as $d){
            $v =["dimensao"=>$d,"parametros"=>$this->parametrosIndicadores($d->id)];
            $var->push($v);
        }  */
        return $v;
    }
    public function index(){
        return parametro::with('dimensao')->get();
    }
    public function store(Request $request){
        try{
                $parametro = new parametro;
                $parametro->descricao = $request->descricao;
                $parametro->peso = $request->peso;
                $parametro->dimensao_id = $request->dimensao_id;
                return $parametro->save()>0? response()->json("Parametro salvo com sucesso", 201):""; 
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }      
    }
    public function update(Request $request, $id){
        try{
            $parametro = parametro::findOrFail($id);
            $parametro->descricao = $request->descricao;
            $parametro->peso = $request->peso;
            $parametro->dimensao_id = $request->dimensao_id;
            return $parametro->update()>0? response()->json("atualizado com sucesso", 200):""; 
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }
         
    }
    public function parametrosIndicadores($id){
          return parametro::where('dimensao_id','=',$id)
        ->with('indicador')->get();
    }

    public function parametro($iddimensao){
        return parametro::where('dimensao_id','=',$iddimensao)->get();
    }
   
}
