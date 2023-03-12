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
    try{
         $Curso = new curso;
         $Curso->descricao = $request->descricao;
         $Curso->timestamps = false;
         return $Curso-> save()>0? response()->json("curso cadastrado com sucesso", 201):"";
      }
       catch(Exception $e){
          return response()->json($e->getMessage(), 400);
    }
   
   }

   public function update(Request $request, $id){
      try{
         $Curso = curso::findOrFail($id);
         $Curso->descricao = $request->descr;
         return $Curso->update()>0? response()->json("atualizado com sucesso", 200):"";
      }catch(Exception $e){
         return response()->json($e->getMessage(), 400);
      }
    
   }

   public function destroy($id){
      try{
         $Curso = curso::findOrFail($id);
         return $Curso->delete()>0? response()->json("deletado com sucesso", 200):"";
      }catch(Exception $e){
         return response()->json($e->getMessage(), 400);
      }

    

   }
}
