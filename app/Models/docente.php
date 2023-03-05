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
    public function DocenteCad(){
         return $this->belongsToMany(cad::class, 'cad_has_docente', 'docente_id', 'cad_id');
    }
}
