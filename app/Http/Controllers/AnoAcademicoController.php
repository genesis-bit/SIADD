<?php

namespace App\Http\Controllers;

use App\Models\ano_academico;
use Illuminate\Http\Request;

class AnoAcademicoController extends Controller
{
    
    public function index()
    {
        return ano_academico::all();
       
    }
}
   
    
    