<?php

namespace App\Http\Controllers;

use App\Models\estudante;
use Illuminate\Http\Request;

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
        return estudante::findOrFail($id);
    }

   

   
    public function update(Request $request, $id)
    {
       $Estudante=estudante::findOrFail($id);
       $Estudante->nome_estudante= $request->nome;
       $Estudante->numero_processo= $request->n_processo;
       $Estudante->numero_bilhete= $request->n_BI;
       $Estudante->update();
       return response()->json(['message'=>'estudante atualizado com sucesso']);
    }

    
    public function destroy($id)
    {
        $Estudante= estudante::findOrFail($id);
        $Estudante->delete();
        return response()->json(['message'=>'estudante deletado']);
    }
}
