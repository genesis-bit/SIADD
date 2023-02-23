<?php

namespace App\Http\Controllers;

use App\Models\unidade_organica;
use Illuminate\Http\Request;

class UnidadeOrganicaController extends Controller
{
    
    public function index()
    {
        return unidade_organica::all();
    }

    
    
    public function store(Request $request)
    {
        $Unidade = new unidade_organica;
        $Unidade->descricao = $request->descricao;
    }

    
    public function show($id)
    {
        return unidade_organica::findOrFail($id);
    }

    
    
    
    public function update($id)
    {
        $Unidade = unidade_organica::findOrFail($id);
        $Unidade->descricao = $request->descricao;
        $Unidade->update();
    }

   
    public function destroy($id)
    {
        $Unidade = unidade_organica::findOrFail($id);
        $Unidade->delete();
    }
}
