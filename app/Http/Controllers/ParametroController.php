<?php

namespace App\Http\Controllers;

use App\Models\parametro;
use Illuminate\Http\Request;

class ParametroController extends Controller
{
   
    public function index()
    {
        return parametro::all();
    }

   
}
