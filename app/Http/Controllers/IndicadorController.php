<?php

namespace App\Http\Controllers;

use App\Models\indicador;
use App\Models\parametro;
use Illuminate\Http\Request;
use Exception;

class IndicadorController extends Controller
{
    
    public function index()
    {
        return indicador::all();
    }
    public function store(Request $request){
        try{
                $indicador = new indicador;
                $indicador->descricao = $request->descricao;
                $indicador->pontuacao = $request->pontuacao;
                $indicador->parametro_id = $request->parametro_id;
                return $indicador->save()>0? response()->json("Indicador salvo com sucesso", 201):""; 
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }      
    }
}
    
