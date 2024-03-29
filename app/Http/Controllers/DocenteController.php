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
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DocenteController extends Controller
{
    public function index(){
        try{
            return docente::with('User')->get();
            //return Hash::make('1234');          
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
           $validator = Validator::make($request->all(), [
                'email' => 'required|email','password' => 'required|string|min:3',
                'nome_docente'=>'required|min:5','cargo_id'=>'required','departamento_id'=>'required',
                'grau_academico_id'=>'required','categoria_profissional_id'=>'required',
                'percentagem_contratacao_id'=>'required','numero_mecanografico'=>'required|unique:docente'
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }
            $User = new User();
            $User->name = $request->nome_docente;
            $User->email = $request->email;
            $User->nivel_acesso_id = 3;//$request->nivel_acesso_id;            
            $User->password = Hash::make($request->password);
            if($User->save()){
                $Id_user = User::all()->last();          
                $Docente = new docente;
                $Docente->id =  $Id_user["id"];
                $Docente->nome_docente = $request->nome_docente;
                $Docente->numero_mecanografico = $request->numero_mecanografico;
                $Docente->unidade_organica_id = 1;
                $Docente->cargo_id = $request->cargo_id;
                $Docente->departamento_id = $request->departamento_id;
                $Docente->grau_academico_id = $request->grau_academico_id;
                $Docente->categoria_profissional_id = $request->categoria_profissional_id;
                $Docente->percentagem_contratacao_id = $request->percentagem_contratacao_id;
                return $Docente->save()>0?response()->json("Salvo com sucesso", 201):"";
            }
    }
    catch(Exception $e){
       // return response()->json("Erro ao cadastrar o docente. Por favor, verifique se o Docente já foi cadastrado ou consulte o Administrador do sistema.", 400); 
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
    public function QtdContratacao(){
        try {
            
        $dados =docente::select(DB::raw('COUNT(id) as total'))->groupBy(['percentagem_contratacao_id'])->get();
       if($dados->count()>1)
             return response()->json(["Integral"=>$dados[0]->total,"Parcial"=>$dados[1]->total],200);
        
        return  response()->json(["Integral"=>$dados[0]->total,"Parcial"=>0],200);

        } catch (Exception $e) {
            
            return response()->json($e->getMessage(), 400);
        }
    }


    public function destroy ($id){
        try{
            $Docente = docente::findOrFail($id);
            $user = User::findOrFail($id);
            if($Docente->delete()>0 && $user->delete()>0){ 
                return response()->json("Deletado com sucesso", 200);
            }
            else{
                return response()->json("Erro ao deletar", 400);
            }
        }catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
    }
    public function RespostaPorPerguntas($id){    
            return docente::where('id','=',$id)->with('RespostaDocente')->get();
    }
    public function disciplinaDocente($id){
        try{
            $disciplina = docente::where('id','=',$id)->with('Disciplina')->get();
            return $disciplina[0]->disciplina;
        }
        catch(Exception $e){
            return response()->json($e->getMessage(), 400);
        }
        
    }
}
