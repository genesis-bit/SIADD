<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudante_has_disciplina extends Model
{
    protected $table='estudante_has_disciplina';
    use HasFactory;
    public function estudante(){
        return $this->hasOne(estudante::class,'id','estudante_id');
    }
    public function disciplina(){
        return $this->hasOne(disciplina::class,'id','disciplina_id');
    }
}
