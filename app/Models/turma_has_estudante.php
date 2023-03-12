<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turma_has_estudante extends Model
{
    protected $table='turma_has_estudante';
    use HasFactory;
    public function estudante(){
        return $this->hasOne(estudante::class,'id','estudante_id');
    }
    public function turma(){
        return $this->hasOne(turma::class,'id','turma_id');
    }
}
