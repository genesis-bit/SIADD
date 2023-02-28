<?php

namespace App\Http\Controllers;

use App\Models\estado_resposta;
use Illuminate\Http\Request;

class EstadoRespostaController extends Controller
{
    public function index(){
        return estado_resposta::all();
    }
}
