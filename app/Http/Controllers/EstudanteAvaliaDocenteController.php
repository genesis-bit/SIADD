<?php

namespace App\Http\Controllers;

use App\Models\estudante_avalia_docente;
use Illuminate\Http\Request;
use App\Models\cad;
use Exception;

class EstudanteAvaliaDocenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //	id	estudante_id	docente_id	periodo_avaliacao_id	indicador_id	escala
        try{
            $cadAtivo = cad::where('ativo','=',1)->select('periodo_avaliacao_id as periodo')->first();
            $avaliacao = new estudante_avalia_docente;       
            $avaliacao->docente_id = $request->docente_id;
            $avaliacao->periodo_avaliacao_id = $cadAtivo->periodo;
            $avaliacao->indicador_id = $request->indicador_id;       
            $avaliacao->escala = $request->escala;
            $avaliacao->estudante_id = $request->estudante_id;
            return $avaliacao->save()>0?response()->json("Adicionado com sucesso",201):"";
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\estudante_avalia_docente  $estudante_avalia_docente
     * @return \Illuminate\Http\Response
     */
    public function show(estudante_avalia_docente $estudante_avalia_docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\estudante_avalia_docente  $estudante_avalia_docente
     * @return \Illuminate\Http\Response
     */
    public function edit(estudante_avalia_docente $estudante_avalia_docente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\estudante_avalia_docente  $estudante_avalia_docente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, estudante_avalia_docente $estudante_avalia_docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\estudante_avalia_docente  $estudante_avalia_docente
     * @return \Illuminate\Http\Response
     */
    public function destroy(estudante_avalia_docente $estudante_avalia_docente)
    {
        //
    }

    public function docentesParaEstudante(int $estudante_id){
        
    }
}
