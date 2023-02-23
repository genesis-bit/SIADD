<?php

namespace App\Http\Controllers;

use App\Models\ano_lectivo;
use Illuminate\Http\Request;

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
        $anoLectivo->save();
    }

    
    public function show($id)
    {
        return ano_lectivo::findOrFail($id);
    }

    
    public function update(Request $request, $id)
    {
        $anoLectivo = ano_lectivo::findOrFail($id);
        $anoLectivo->descricao = $request->descricao;
        $anoLectivo->update(); 
    }

    
    public function destroy($id)
    {
        $anoLectivo = ano_lectivo::findOrFail($id);
        $anoLectivo->delete();
    }
}
