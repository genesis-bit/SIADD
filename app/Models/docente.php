<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class docente extends Model
{
    protected $table='docente';
    protected $fillable =[
        'nome_docente'
    ];
    use HasFactory;
}