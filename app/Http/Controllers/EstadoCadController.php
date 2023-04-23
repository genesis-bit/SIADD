<?php

namespace App\Http\Controllers;

use App\Models\estado_cad;
use Exception;
use Illuminate\Http\Request;

class EstadoCadController extends Controller
{
    public function index(){
        try{
            return estado_cad::all();
        }
        catch(Exception $e){
            return response()->json($e->getMessage(),400);
        }
    }

}
