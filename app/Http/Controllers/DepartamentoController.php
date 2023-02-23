<?php

namespace App\Http\Controllers;

use App\Models\departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    
    public function index()
    {
        return departamento::all();
    }

    
    public function store(Request $request)
    {
        $Departamento = new departamento;
        $Departamento->descricao = $request->descricao;
        $Departamento->save(); 
    }

    
    public function show($id)
    {
        return departamento::findOrFail($id);
        
    }

    
    public function update(Request $request, $id)
    {
        $Departamento = departamento::findOrFail($id);
        $Departamento->descricao = $request->descricao;
        $Departamento->update(); 
    }

    
    public function destroy($id)
    {
       $Departamento = departamento::findOrFail($id);
       $Departamento->delete(); 
    }
}
