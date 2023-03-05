<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cad_has_docente extends Model
{
    protected $table='cad_has_docente';
    use HasFactory;
    public function Docente(){
        return $this->hasOne(docente::class,'id','docente_id');
    }
    public function Cad(){
        return $this->hasOne(cad::class,'id','cad_id');
    }
    public function EstadoCad(){
        return $this->hasOne(estado_cad::class,'id','estado_cad_id');
    }
}
