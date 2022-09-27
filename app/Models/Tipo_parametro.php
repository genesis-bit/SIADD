<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_parametro extends Model
{
    use HasFactory;
    protected $tabe='tipo_parametros';
    protected $fillable=[
        'descricao',
    ]; 
}
