<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use Illuminate\Http\Request;

class CargoController extends Controller
{
    
    public function index()
    {
        return cargo::all();
    }

    
   
    public function store(Request $request)
    {
        $Cargo = new cargo;
        $Cargo->descricao = $request->descricao;
        $Cargo->save();
        
    }

    
    public function show($id)
    {
        return cargo::findOrFail($id);
   
    }

   
    
    public function update(Request $request, $id)
    {
        $Cargo = cargo::findOrFail($id);
        $Cargo->descricao = $request->descricao;
        $Cargo->update();
        
    }

    
    public function destroy($id)
    {
        $Cargo = cargo::findOrFail($id);
        $Cargo->delete();
        
    }
}
