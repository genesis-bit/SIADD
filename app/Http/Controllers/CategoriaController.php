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

        $categoria->save();
    }

    
    public function show($id)
    {
        return categoria::findOrFail($id);
    }

    
     
    public function update(Request $request, $id)
    {
        $categoria = categoria::findOrFail($id);
        $categoria->descricao = $request->descricao;
    }

   
    public function destroy($id)
    {
        $categoria = categoria::findOrFail($id);
        $categoria->delete();
        
    }
}
