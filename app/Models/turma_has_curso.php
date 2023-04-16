<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turma_has_curso extends Model
{
    protected $table = 'turma_has_curso';
    use HasFactory;
    public function turma(){
        return $this->hasOne(turma::class,'id','turma_id');
    }
    public function curso(){
        return $this->hasOne(curso::class,'id','curso_id');
    }
    public function anoletivo(){
        return $this->hasOne(ano_lectivo::class,'id','ano_lectivo_id');
    }
    public function anoacademico(){
        return $this->hasOne(ano_academico::class,'id','ano_academico_id');
    }
    public function semestre(){
        return $this->hasOne(semestre::class,'id','semestre_id');
    }
    public function Docente(){
        return $this->belongsToMany(docente::class, 'turma_has_docente', 'turma_id', 'docente_id');
   }
}
