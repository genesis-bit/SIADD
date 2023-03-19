<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    protected $table='docente';
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class,'id','id');
    }
    /*
	
unidade_organica_id	
cargo_id	
departamento_id	
grau_academico_id	
categoria_profissional_id	
percentagem_contratacao_id*/
    public function UnidadeOrganica(){
        return $this->hasOne(unidade_organica::class,'id','unidade_organica_id');
    }
    public function GrauAcademico(){
        return $this->hasOne(grau_academico::class,'id','grau_academico_id');
    }
    public function Cargo(){
        return $this->hasOne(cargo::class,'id','cargo_id');
    }
    public function Categoria(){
        return $this->hasOne(categoria::class,'id','categoria_profissional_id');
    }
    public function Percentagem(){
        return $this->hasOne(percentagem_contratacao::class,'id','percentagem_contratacao_id');
    }

    public function RespostaDocente(){
        return $this->hasMany(avaliacao_has_docente::class,'docente_id','id');
    }
}
