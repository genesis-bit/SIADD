<?php

namespace App\Http\Controllers;

use App\Models\dimensao;
use App\Models\parametro;
use Illuminate\Http\Request;

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
    public function parametrosIndicadores($id){
          return parametro::where('dimensao_id','=',$id)
        ->with('indicador')->get();
    }

    public function parametro($iddimensao){
        return parametro::where('dimensao_id','=',$iddimensao)->get();
    }
   
}
