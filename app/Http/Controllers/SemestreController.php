<?php

namespace App\Http\Controllers;

use App\Models\semestre;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
   
    public function index()
    {
        
        $semestre = semestre::all();
        return json_encode($semestre);
    }

    
   

    
}
