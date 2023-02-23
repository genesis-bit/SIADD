<?php

namespace App\Http\Controllers;

use App\Models\curso;
use Illuminate\Http\Request;

class CursoController extends Controller
{
   public function index(){
    return curso::all();

   }

   public function show($id){
    return curso::findOrFail($id);
   }

   public function store(Request $request){
    $Curso = new curso;
    $Curso->descricao = $request->descr;
    $Curso-> save();
    return response()->json(['message'=>'cadastrado']);
   }

   public function update(Request $request, $id){
    $Curso = curso::findOrFail($id);
    $Curso->descricao = $request->descr;
    $Curso->update();
   }

   public function destroy($id){

    $Curso = curso::findOrFail($id);
    $Curso->delete();

   }
}
