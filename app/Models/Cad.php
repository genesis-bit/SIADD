<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cad extends Model
{
    protected $table='cad';
    protected $fillable = [
        'descricao'
    ];
    use HasFactory;
}
