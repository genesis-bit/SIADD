<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avaliador extends Model
{
    protected $table='avaliador';
    use HasFactory;

    public function Docente(){
        return $this->hasOne(docente::class,'id','docente_id');
    } 
    public function Avaliador1(){
        return $this->hasOne(docente::class,'id','avaliador1_id');
    }
    public function Avaliador2(){
        return $this->hasOne(docente::class,'id','avaliador2_id');
    }
}
