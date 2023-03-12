<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudante_avalia_docente extends Model
{
    protected $table='estudante_avalia_docente';
    use HasFactory;
    public function estudante(){
        return $this->hasOne(estudante::class,'id','estudante_id');
    }
    public function docente(){
        return $this->hasOne(docente::class,'id','docente_id');
    }
}
