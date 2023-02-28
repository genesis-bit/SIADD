<?php

namespace App\Http\Controllers;

use App\Models\estado_cad;
use Illuminate\Http\Request;

class EstadoCadController extends Controller
{
    public function index(){

        return estado_cad::all();
   
    }

}
