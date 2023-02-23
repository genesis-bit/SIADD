<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turma extends Model
{
    protected $table='turma';
    protected $fillable=[
        'descricao',
    ];
    use HasFactory;
}
