<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ano_lectivo extends Model
{
    protected $table='ano_lectivo';
    protected $fillable = [
        'descricao'
    ];
    use HasFactory;
}
