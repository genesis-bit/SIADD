<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cad extends Model
{
    use HasFactory;
    protected $table= 'cads';
    protected $fillable = [
        'votos_a_favor',
        'votos_contra',
        'data_criacao',
        'descricao',
        'titulo',
    ];
}
