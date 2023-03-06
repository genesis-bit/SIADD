<?php

namespace App\Http\Controllers;

use App\Models\avaliador;
use App\Models\docente;
use Illuminate\Http\Request;

class AvaliadorController extends Controller
{
   public function index(){
        $avaliadores = avaliador::all();
        return json_encode($avaliadores);
   }
   public function create(){
    $docente = docente::all();
   }
}
