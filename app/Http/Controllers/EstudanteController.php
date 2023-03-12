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
        try{
            $request->validate([
                'nome'=>'required',
                'n_processo'=>'required',
                'n_BI'=>'required'
            ]);
            $Estudante=new estudante;
            $Estudante->nome_estudante = $request->nome;
            $Estudante->numero_processo = $request->n_processo;
            $Estudante->numero_bilhete = $request->n_BI;
            $Estudante->timestamps = false;
            return $Estudante->save()>0? response()->json("Cadastrado com sucesso", 201):"";
            
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        
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
            $Estudante->timestamps = false;
            $Estudante->update()>0? response()->json("Atualizado com sucesso", 200):"";
            
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
      
    }

    
    public function destroy($id)
    {
        try{
            $Estudante= estudante::findOrFail($id);
            $Estudante->delete()>0? response()->json("Deletado com sucesso", 200):"";
            
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
       
    }
}
