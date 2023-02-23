<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class departamento extends Model
{
    protected $table='departamento';
    protected $fillable = [
        'descricao'
    ];
    use HasFactory;
}
