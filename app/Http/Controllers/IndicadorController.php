<?php

namespace App\Http\Controllers;

use App\Models\indicador;
use Illuminate\Http\Request;

class IndicadorController extends Controller
{
    
    public function index()
    {
        return indicador::all();
    }
}
    
