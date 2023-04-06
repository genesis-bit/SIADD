<?php

namespace App\Http\Controllers;

use App\Models\cad_has_docente;
use App\Models\docente;
use App\Models\estado_cad;
use App\Models\cad;
use Exception;
use Illuminate\Http\Request;

class CadHasdocenteController extends Controller
{
   
    public function index()
    {
        return cad_has_docente::with(['Docente','Cad','estadoCad'])->get();
    }

    public function create()
    {
        //
        $cad = cad::all();
        $docentes = docente::all();
        $estadoCad = estado_cad::all();
        return json_encode([$docentes, $cad, $estadoCad]);
    }

    public function store(Request $request)
    {
        try{
            $membroCad = new cad_has_docente();
            $membroCad->cad_id = $request->cad_id;
            $membroCad->docente_id = $request->docente_id;
            $membroCad->estado_cad_id = $request->estado_cad_id;
            return $membroCad->save()>0?response()->json("Salvo com sucesso", 201):"";
            
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
  
    }

    public function show(cad_has_docente $cad_has_docente)
    {
        //
        $mc = cad_has_docente::where('cad_id','=',1)->where('docente_id','=',1)->get();
        $mc->estado_cad_id = 2;
        return $mc->save();
    }

    public function edit(cad_has_docente $cad_has_docente)
    {
        //
    }


    public function update(Request $request, cad_has_docente $cad_has_docente)
    {
        //
    }
    public function destroy(cad_has_docente $cad_has_docente)
    {
        //
    }
    public function DocentesCad($idCad){
        try{
            $cad = cad::find($idCad)->with('DocenteCad')->get();
            return $cad;
            //Cad
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
