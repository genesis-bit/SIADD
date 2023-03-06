<?php

namespace App\Http\Controllers;

use App\Models\ano_lectivo;
use Illuminate\Http\Request;

class AnoLectivoController extends Controller
{
    
    public function index()
    {
        return ano_lectivo::all();
        
    }

    

    
    public function store(Request $request)
    {
        $anoLectivo = new ano_lectivo;
        $anoLectivo->descricao = $request->descricao;
        $anoLectivo->save();
    }

    
    public function show($id)
    {
        try{
            return ano_lectivo::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    
    public function update(Request $request, $id)
    {
        try{
            $anoLectivo = ano_lectivo::findOrFail($id);
            $anoLectivo->descricao = $request->descricao;
            $anoLectivo->update()>0?"Atualizado com sucesso":"erro ao atualizar"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    
    public function destroy($id)
    {
        try{
            $anoLectivo = ano_lectivo::findOrFail($id);
            $anoLectivo->delete()>>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
