<?php

namespace App\Http\Controllers;

use App\Models\dimensao;
use Illuminate\Http\Request;

class DimensaoController extends Controller
{
    
    public function index()
    {
        return dimensao::all();
    }

   
    
}
