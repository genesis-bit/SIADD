<?php

namespace App\Http\Controllers;

use App\Models\docente;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(){
        return docente::all();
    }

    public function show ($id){
        return docente::findOrFail($id);
    }

    public function store(Request $request){
        $Docente = new docente;
        $Docente->nome_docente = $request->nome_docente;
        $Docente->numero_mecanografico = $request->n_mecanografico;
        $Docente->save();
    }
    
    public function update(Request $request, $id){
        $Docente = docente::findOrFail($id);
        $Docente->nome_docente = $request->nome_docente;
        $Docente->numero_mecanografico = $request->n_mecanografico;
        $Docente->update();
    }

    public function destroy ($id){
        $Docente = docente::findOrFail($id);
        $Docente->delete();
    }
}
