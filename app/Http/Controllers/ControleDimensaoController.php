<?php

namespace App\Http\Controllers;

use App\Models\controle_dimensao;
use Illuminate\Http\Request;
use Exception;

class ControleDimensaoController extends Controller
{public function index(){
    try{
        return controle_dimensao::all();
    }
    catch(Exception $e){
        return response()->json($e->getMessage(), 400); 
    }
}



public function store(Request $request){
    try{
            $controle = new controle_dimensao;
            $controle->docente_id = $request->docente_id;
            $controle->dimensao_id = $request->dimensao_id;
            $controle->periodo_id = $request->periodo_id;
            return $controle->save()>0? response()->json("Salvo com sucesso", 201):""; 
    }
    catch(Exception $e){
        return response()->json($e->getMessage(), 400); 
    }
  
}

public function update(Request $request, $id){
    try{
      
    }catch(Exception $e){
        return response()->json($e->getMessage(), 400); 
    }
     
}

public function destroy($docente_id,$dimensao_id,$periodo_id){
    try{
       $controle = controle_dimensao::findOrFail([$docente_id,$dimensao_id,$periodo_id]);
       return $controle->delete()>0?response()->json('Deletado com sucesso',200):"";
    }catch(Exception $e){
        return response()->json($e->getMessage(), 400); 
    }
    
}
}
