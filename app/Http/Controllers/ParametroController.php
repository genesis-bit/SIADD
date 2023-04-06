<?php

namespace App\Http\Controllers;

use App\Models\dimensao;
use App\Models\parametro;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
   
    public function dimensaoParametro()
    {
        $dim = dimensao::all();
        $var = collect([]);
        foreach($dim as $d){
            $v =["dimensao"=>$d,"parametros"=>$this->parametrosIndicadores($d->id)];
            $var->push($v);
        }
        return $var;
    }
    public function parametrosIndicadores($id){
          return parametro::where('dimensao_id','=',$id)
        ->with('indicador')->get();
    }
   
}
