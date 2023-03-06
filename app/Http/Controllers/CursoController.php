<?php

namespace App\Http\Controllers;

use App\Models\curso;
use Illuminate\Http\Request;
Use Exception;

class CursoController extends Controller
{
   public function index(){
    return curso::all();

   }

   public function show($id){
      try{
         return curso::findOrFail($id);
      }catch(Exception $e){
         return $e->getMessage();
      }
    
   }

   public function store(Request $request){
    $Curso = new curso;
    $Curso->descricao = $request->descr;
    $Curso-> save();
    return response()->json(['message'=>'cadastrado']);
   }

   public function update(Request $request, $id){
      try{
         $Curso = curso::findOrFail($id);
         $Curso->descricao = $request->descr;
         $Curso->update()>0?"Atualizado com sucesso":"erro ao atualizar";
      }catch(Exception $e){
         return $e->getMessage();
      }
    
   }

   public function destroy($id){
      try{
         $Curso = curso::findOrFail($id);
         $Curso->delete()>0?"Deletado com sucesso":"Nao encontrado";
      }catch(Exception $e){
         return $e->getMessage();
      }

    

   }
}
