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
        return categoria::findOrFail($id);
    }

    
     
    public function update(Request $request, $id)
    {
        $Categoria = categoria::findOrFail($id);
        $Categoria->descricao = $request->descricao;
    }

   
    public function destroy($id)
    {
        $Categoria = categoria::findOrFail($id);
        $Categoria->delete();
        
    }
}
