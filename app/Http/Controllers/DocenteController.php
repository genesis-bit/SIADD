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
        return docente::with('User')->get();
    }

    public function create(){
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

    }

    public function show ($id){
        return docente::findOrFail($id);
    }

    public function store(Request $request){
        $Docente = new docente;
        $Docente->id = $request->id;
        $Docente->nome_docente = $request->nome_docente;
        $Docente->numero_mecanografico = $request->n_mecanografico;
        $Docente->unidade_organica_id = $request->unidade_organica_id;
        $Docente->cargo_id = $request->cargo_id;
        $Docente->departamento_id = $request->departamento_id;
        $Docente->grau_academico_id = $request->grau_academico_id;
        $Docente->categoria_profissional_id = $request->categoria_profissional_id;
        $Docente->percentagem_contratacao_id = $request->percentagem_contratacao_id;
        if($Docente->save())
            return json_encode('Adicionado com sucesso');
        return json_encode('Falha ao Salvar');
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
        return $Docente->update()>0?"Atualização feita com sucesso":"Falha em atualizar";
       }
       catch(Exception $e){
            return $e->getMessage();
       }
    }

    public function destroy ($id){
        try{
            $Docente = docente::findOrFail($id);
            return $Docente->delete()>0?"Deletado com Sucesso":"Falha ao deletar";
        }
        catch(Exception $e){
            $e->getMessage();
        }
    }
    public function RespostaPorPerguntas($id){
        $Docente = docente::where('id','=',$id)->with('RespostaDocente')->get();
        return $Docente;
    }
}
