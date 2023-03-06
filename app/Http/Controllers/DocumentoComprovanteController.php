<?php

namespace App\Http\Controllers;

use App\Models\documento_comprovante;
use Illuminate\Http\Request;
use Exception;

class DocumentoComprovanteController extends Controller
{
    public function store(Request $request){
        $Doc = new documento_comprovante;
        $Doc->descricao = $request->descricao;
        $Doc->save();
    }

    public function update(Request $request, $id){
        try{
            $Doc =  documento_comprovante::findOrFail($id);
            $Doc->descricao = $request->descricao;
            $Doc->update()>0?"Atualizado com sucesso":"erro atualizar";
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    public function destroy($id){
        try{
            $Doc = documento_comprovante::findOrFail($id);
            $Doc->delete()>0?"Deletado com sucesso":"Nao encontrado"; 
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    
}
