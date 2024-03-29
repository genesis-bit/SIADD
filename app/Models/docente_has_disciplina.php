<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docente_has_disciplina extends Model
{
    protected $table='docente_has_disciplina';
    use HasFactory;
    public function docente(){
        return $this->hasOne(docente::class,'id','docente_id');
    }
    public function disciplina(){
        return $this->hasOne(disciplina::class,'id','disciplina_id');
    }
}
