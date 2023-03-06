<?php

namespace App\Http\Controllers;

use App\Models\estudante;
use Illuminate\Http\Request;
use Exception;

class EstudanteController extends Controller
{
    
    public function index()
    {
        return estudante::all();
    }

    
   
    public function store(Request $request)
    {
        $request->validate([
            'nome'=>'required',
            'n_processo'=>'required',
            'n_BI'=>'required'
        ]);
        $Estudante=new estudante;
        $Estudante->nome_estudante = $request->nome;
        $Estudante->numero_processo = $request->n_processo;
        $Estudante->numero_bilhete = $request->n_BI;
        $Estudante->save();
        return response()->json(['message'=>'estudante adicionado com sucesso']); 
    }

   
    public function show($id)
    {
        try{
            return estudante::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

   

   
    public function update(Request $request, $id)
    {
        try{
            $Estudante=estudante::findOrFail($id);
            $Estudante->nome_estudante= $request->nome;
            $Estudante->numero_processo= $request->n_processo;
            $Estudante->numero_bilhete= $request->n_BI;
            $Estudante->update()>0?"Atualizado com sucesso":"erro ao atualizar";
            
        }catch(Exception $e){
            return $e->getMessage();
        }
      
    }

    
    public function destroy($id)
    {
        try{
            $Estudante= estudante::findOrFail($id);
            $Estudante->delete()>0?"Deletado com sucesso":"Nao encontrado";
            
        }catch(Exception $e){
            return $e->getMessage();
        }
       
    }
}
