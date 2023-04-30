<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class avaliacao_has_docente extends Model
{
    protected $table='avaliacao_has_docente';
    use HasFactory;
    public function docente(){
        return $this->hasOne(docente::class,'id','docente_id');
    }
    public function estadoResposta(){
        return $this->hasOne(estado_resposta::class,'id','estado_resposta_id');
    }
    public function indicador(){
        return $this->hasOne(indicador::class,'id','indicador_id');
    }

    public function comprovante(){
        return Storage::path($this->documento_comprovante);
    }
}
