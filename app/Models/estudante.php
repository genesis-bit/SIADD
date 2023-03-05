<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudante extends Model
{
    protected $table='estudante';
    protected $fillable=[
        'nome_estudante',
        'numero_processo',
        'numero_bilhete',
    ];
    use HasFactory;
    public function user(){
        return $this->hasOne(User::class,'id','id');
    }
}
