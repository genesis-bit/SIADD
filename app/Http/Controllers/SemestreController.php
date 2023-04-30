<?php

namespace App\Http\Controllers;

use App\Models\semestre;
use Exception;
use Illuminate\Http\Request;

class SemestreController extends Controller
{
   
    public function index()
    {   
        try{
            return semestre::all();
        }catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

        
}
