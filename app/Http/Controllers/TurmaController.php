<?php

namespace App\Http\Controllers;

use App\Models\turma;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
   
    public function index()
    {
        return turma::all();
    }

    
   
    public function store(Request $request)
    {
        $Turma=new turma;

        $Turma->descricao= $request->desc;
        $Turma->save();
        
    }

    
    public function show(turma $id)
    {
        return turma::findOrFail($id);
    }

   
    public function update(Request $request, $id)
    {
        $Turma=turma::findOrFail($id);
        $Turma->descricao = $request->descricao;
        $Turma->update();
    }

   
    public function destroy($id)
    {
        $Turma=turma::findOrFail($id);
        $Turma->delete();
    }
}
