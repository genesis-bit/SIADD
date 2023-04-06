<?php

namespace App\Http\Controllers;

use App\Models\cad;
use App\Models\cad_has_docente;
use App\Models\grau_academico;
use Illuminate\Http\Request;
use Exception;

class CadController extends Controller
{
    public function index(){
        return cad::with('DocenteCad')->get();
   
    }

    public function show($id){
        try{
            return cad::findOrFail($id);
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function store(Request $request){
        try{
            $Cad = new cad;
            $Cad->descricao = $request->descricao;
            $Cad->periodo_avaliacao_id = $request->periodo_avaliacao_id;
            if($Cad->save()>0){
                cad::where('id', '<>', $Cad->id)->update(['ativo'=>0]);
                return response()->json("Salvo com sucesso",201);
            }
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        
    }

    public function ativarcad($id){
        try{
            cad::where('id', '=', $id)->update(['ativo'=>1]);
            cad::where('id', '<>', $id)->update(['ativo'=>0]);
            return response()->json("Cad ativado com sucesso",200);
        }
        catch(Exception $e){
            response()->json($e->getMessage(),400);
        }
       
    }

    public function update(Request $request, $id){
        try{
            $Cad = cad::findOrFail($id);
            $Cad->descricao = $request->descricao;
            $Cad->periodo_avaliacao_id = $request->periodo_avaliacao_id;
            return $Cad->update()>0?response()->json("Atualizado com sucesso",200):"";

        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);            
        }
        
    }

    public function destroy($id){
        try{
            $Cad = cad::findOrFail($id);
            return $Cad->delete()>0?response()->json("Deletado com sucesso",200):"";
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400); 
        }        
    }
    public function validarCad($id){
        $membrosCad = cad_has_docente::where('cad_id', '=', $id)->with(['Docente','estadoCad'])->get();
        if($membrosCad->count() >= 5 && $membrosCad->count()<=9){
            $IDdoutor = grau_academico::where('descricao','=','Doutor')->get('id')->first();
             foreach($membrosCad as $mc){
                if($mc->grau_academico_id == $IDdoutor->id){
                    // 1 validado e não ativo, 0 não validado, 2 validado e ativo
                    cad::where('id', '=', $id)->update(['ativo'=>1]);
                    return response()->json("Validado",200);
                }
             }
             return response()->json("Neste CAD não contém nenhum docente com nivel de Doutor", 400);
         
        }
        return response()->json("O cad é formado no minimo de 5 docentes e maximo de 9", 400);

    }
}
