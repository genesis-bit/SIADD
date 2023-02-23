<?php

namespace App\Http\Controllers;

use App\Models\disciplina;
use Illuminate\Http\Request;

class DisciplinaController extends Controller
{
    public function index(){
        return disciplina::all();
    }

    public function show($id){
        return disciplina::findOrFail($id);
    }

    public function store(Request $request){
        $Disciplina = new disciplina;
        $Disciplina->descricao = $request->descricao;
        $Disciplina->save();  
    }

    public function update(Request $request, $id){
        $Disciplina = disciplina::findOrFail($id);
        $Disciplina->descricao = $request->descricao;
        $Disciplina->update();  
    }

    public function destroy($id){
        $Disciplina = disciplina::findOrFail($id);
        $Disciplina->delete(); 
    }
}
