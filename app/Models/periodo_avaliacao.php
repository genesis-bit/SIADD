<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class periodo_avaliacao extends Model
{
    protected $table='periodo_avaliacao';
    protected $fillable = [
        'descricao'
    ];
    use HasFactory;
}
