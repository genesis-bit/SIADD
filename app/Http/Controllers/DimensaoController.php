<?php

namespace App\Http\Controllers;

use App\Models\dimensao;
use App\Models\parametro;
use Illuminate\Http\Request;

class DimensaoController extends Controller
{
    
    public function index()
    {
       // $dim = dimensaoArr::join($array, 'glue');
        $s = collect([]);
       // return $dim;
    }
    public function indexq(){
        return dimensao::innerJoin();
       }

   
    
}
