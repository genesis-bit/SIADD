<?php

namespace App\Http\Controllers;

use App\Models\ano_lectivo;
use Illuminate\Http\Request;
use Exception;

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
        return $anoLectivo->save()>0?"Salvo com sucesso":"Erro ao Salvar";
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
            return $anoLectivo->update()>0?"Atualizado com sucesso":"erro ao atualizar"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    
    public function destroy($id)
    {
        try{
            $anoLectivo = ano_lectivo::findOrFail($id);
            return $anoLectivo->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
