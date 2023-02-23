<?php

namespace App\Http\Controllers;

use App\Models\grau_academico;
use Illuminate\Http\Request;

class GrauAcademicoController extends Controller
{
   
    public function index(){
        return grau_academico::all();
    }

    public function show($id){
        return grau_academico::findOrFail($id);
    }

    public function store(Request $request){
        $Grau = new grau_academico;
        $Grau->descricao = $request->description;
        $Grau->save();
    }

    public function update(Request $request, $id){
        $Grau = grau_academico::findOrFail($id);
        $Grau->descricao = $request->description;
        $Grau->update();
    }

    public function destroy($id){
        $Grau = grau_academico::findOrFail($id);
        $Grau->delete();
    }
}
