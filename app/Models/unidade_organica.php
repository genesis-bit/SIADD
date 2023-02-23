<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unidade_organica extends Model
{
    protected $table='unidade_organica';
    protected $fillable = [
        'descricao'
    ];
    use HasFactory;
}
