<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dimensao extends Model
{
    protected $table='dimensao';
    use HasFactory;

    public function indicadores(){
        return $this->hasManyThrough(indicador::class,parametro::class,'dimensao_id','parametro_id','id','id');
    }
    public function parametros(){
        return $this->hasMany(parametro::class,'dimensao_id','id');
    }
}
