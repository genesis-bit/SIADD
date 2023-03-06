<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    public function index()
    {
        return categoria::all();
    }

    
    
    public function store(Request $request)
    {
        $Categoria= new categoria;
        $Categoria->descricao= $request->descricao;

        $Categoria->save();
    }

    
    public function show($id)
    {
        try{
            return categoria::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    
     
    public function update(Request $request, $id)
    {
        try{
            $Categoria = categoria::findOrFail($id);
            $Categoria->descricao = $request->descricao;
            $Categoria->update()>0?"Atualizado com sucesso":"erro ao atualizar";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

   
    public function destroy($id)
    {
        try{
            $Categoria = categoria::findOrFail($id);
            $Categoria->delete()>0?"Deletado com sucesso":"Nao encontrado";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
        
    }
}
