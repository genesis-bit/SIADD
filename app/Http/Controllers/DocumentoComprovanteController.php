<?php

namespace App\Http\Controllers;

use App\Models\documento_comprovante;
use Illuminate\Http\Request;

class DocumentoComprovanteController extends Controller
{
    public function store(Request $request){
        $doc = new documento_comprovante;
        $doc->descricao = $request->descricao;
        $doc->save();
    }

    public function update(Request $request, $id){
        $doc =  documento_comprovante::findOrFail($id);
        $doc->descricao = $request->descricao;
        $doc->update();
    }

    public function destroy($id){
        $doc = documento_comprovante::findOrFail($id);
        $doc->delete(); 
    }

    
}
