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
    public function Avaliador(){
        return $this->hasOne(docente::class,'id','avaliador_id');
    }
}
