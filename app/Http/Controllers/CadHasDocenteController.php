<?php

namespace App\Http\Controllers;

use App\Models\cad_has_docente;
use App\Models\docente;
use App\Models\estado_cad;
use App\Models\cad;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class CadHasdocenteController extends Controller
{
   
    public function index()
    {
        return cad_has_docente::with(['Docente','Cad','estadoCad','funcao'])->get();
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
            $cadAtivo = cad::where('ativo','=',1)->get()->first();
            $membroCad = new cad_has_docente();
            $membroCad->cad_id = $cadAtivo->id;
            $membroCad->docente_id = $request->docente_id;
            $membroCad->estado_cad_id = $request->estado_cad_id;
            $membroCad->funcao_id = $request->funcao_cad_id;

            //Mudar o previlegio do docente para docenteCad
            $user = User::find($request->docente_id);
            $user->nivel_acesso_id = 2;
            $user->update();
            
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
            $docenteCad_id = cad_has_docente::where('cad_id','=',$idCad)->get('docente_id');
            $cad = cad::where('id','=',$idCad)->with('PeriodoAvaliacao')->first();
            $docente = docente::whereIn('id',$docenteCad_id)
                ->with(["UnidadeOrganica","Percentagem","Categoria","GrauAcademico","Cargo", "Departamento"])->get();
            return ["cad"=>$cad,"Docentes"=>$docente];
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
    //Retorna todos os professores não pertecentes ao Cad ativo.
    public function DocenteParaCad(){
        try{
            $cad = cad::where('ativo','=',1)->select('id')->first();
            $docenteCad_id = cad_has_docente::where('cad_id','=',$cad->id)->get('docente_id');
            $docente = docente::whereNOtIn('id',$docenteCad_id)
                ->with(["UnidadeOrganica","Percentagem","Categoria","GrauAcademico","Cargo", "Departamento"])->get();
            return $docente;
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
}
