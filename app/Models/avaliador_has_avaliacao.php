<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class avaliador_has_avaliacao extends Model
{
    protected $table='avaliador_has_avaliacao';
    use HasFactory;
    public function avaliacao(){
        return $this->hasOne(avaliacao_has_docente::class,'id','avaliacao_id');
    }
    public function avaliador(){
        return $this->hasOne(docente::class,'id','avaliador_id');
    }
    public function estadoResposta(){
        return $this->hasOne(estado_resposta::class,'id','estado_resposta_id');
    }
}
