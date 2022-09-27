<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caminho_comprovante extends Model
{
    use HasFactory;
    protected $table='documento_comprovantes';
    protected $fillable=[
        'caminho',
        'descricao',
    ];
}
