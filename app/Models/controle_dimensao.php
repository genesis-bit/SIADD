<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class controle_dimensao extends Model
{
    protected $table='controle_dimensao';
    use HasFactory;
    public function Dimensao(){
        return $this->hasOne(dimensao::class,'id','dimensao_id');
    }
    public function Docente(){
        return $this->hasOne(docente::class,'id','docente_id');
    }
    public function Periodo(){
        return $this->hasOne(periodo_avaliacao::class,'id','periodo_id');
    }
}
