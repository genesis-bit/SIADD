<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turma_has_docente extends Model
{
    use HasFactory;
    protected $table = "turma_has_docente"; 
    
    public function docente(){
        return $this->hasOne(docente::class,'id','docente_id');
    }
    public function turma(){
        return $this->hasOne(turma_has_curso::class,'id','turma_id');
    }
    public function turmas(){
        return $this->hasMany(turma_has_curso::class,'id','turma_id');
    }
    
}
