<?php

namespace App\Http\Controllers;

use App\Models\cad;
use Illuminate\Http\Request;

class CadController extends Controller
{
    public function index(){
        return cad::all();
    }

    public function show($id){
        return cad::findOrFail($id);
    }

    public function store(Request $request){
        $Cad = new cad;
        $Cad->descricao = $request->descricao;
        $Cad->save();
    }

    public function update(Request $request, $id){
        $Cad = cad::findOrFail($id);
        $Cad->descricao = $request->descricao;
        $Cad->update();
    }

    public function destroy($id){
        $Cad = cad::findOrFail($id);
        $Cad->delete();
    }
}
