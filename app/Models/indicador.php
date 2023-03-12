<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class indicador extends Model
{
    protected $table='indicador';
    use HasFactory;
    public function parametro(){
        return $this->hasOne(parametro::class,'id','parametro_id');
    }
}
