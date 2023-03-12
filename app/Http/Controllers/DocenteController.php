<?php

namespace App\Http\Controllers;

use App\Models\cargo;
use App\Models\categoria;
use App\Models\departamento;
use App\Models\docente;
use App\Models\grau_academico;
use App\Models\percentagem_contratacao;
use App\Models\unidade_organica;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function index(){
        try{
            return docente::with('User')->get();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }

    /*public function create(){
        $UserCadastrados_id = docente::select('id')->get();
        $user = User::whereNotIn('id',$UserCadastrados_id)->get();
        $unidadeOrganica = unidade_organica::all();
        $cargo = cargo::all();
        $departamento = departamento::all();
        $grauAcademico = grau_academico::all();
        $categoriaProfissional = categoria::all();
        $percentagemContratacao = percentagem_contratacao::all();
       return json_encode([$user, $unidadeOrganica,$cargo,$departamento,
        $grauAcademico,$categoriaProfissional,$percentagemContratacao]);

    }*/

    public function show ($id){
        try{
            return docente::findOrFail($id);
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        
    }

    public function store(Request $request){
        //Salvar User!      
        try{
            $User = new User();
            $User->name = $request->nome_docente;
            $User->email = $request->email;
            $User->nivel_acesso_id = $request->nivel_acesso_id;
            $User->password = $request->password;
            if($User->save()){
                //Salvar Docente
                $Id_user = User::all()->last();          
                $Docente = new docente;
                $Docente->id =  $Id_user["id"];
                $Docente->nome_docente = $request->nome_docente;
                $Docente->numero_mecanografico = $request->numero_mecanografico;
                $Docente->unidade_organica_id = $request->unidade_organica_id;
                $Docente->cargo_id = $request->cargo_id;
                $Docente->departamento_id = $request->departamento_id;
                $Docente->grau_academico_id = $request->grau_academico_id;
                $Docente->categoria_profissional_id = $request->categoria_profissional_id;
                $Docente->percentagem_contratacao_id = $request->percentagem_contratacao_id;
                return $Docente->save()>0?response()->json("Salvo com sucesso", 201):""; 
            }
    }
    catch(Exception $e){
        return response()->json($e->getMessage(), 400); 
    }
    }
    
    public function update(Request $request, $id){
        try{
                $Docente = docente::findOrFail($id);
                $Docente->nome_docente = $request->nome_docente;
                $Docente->numero_mecanografico = $request->n_mecanografico;
                $Docente->unidade_organica_id = $request->unidade_organica_id;
                $Docente->cargo_id = $request->cargo_id;
                $Docente->departamento_id = $request->departamento_id;
                $Docente->grau_academico_id = $request->grau_academico_id;
                $Docente->categoria_profissional_id = $request->categoria_profissional_id;
                $Docente->percentagem_contratacao_id = $request->percentagem_contratacao_id;
                return $Docente->update()>0? response()->json("Atualizado com sucesso", 200):"";
        }
        catch(Exception $e){
                 return response()->json($e->getMessage(), 400);
        }
    }

    public function destroy ($id){
        try{
            $Docente = docente::findOrFail($id);
            return $Docente->delete()>0? response()->json("Deletado com sucesso", 200):"";
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
            return response()->json($e->getMessage(), 400);
        }
    }
    public function RespostaPorPerguntas($id){    
            return docente::where('id','=',$id)->with('RespostaDocente')->get();
    }
}
