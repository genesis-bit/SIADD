<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dimensao extends Model
{
    use HasFactory;
    protected $table='dimensaos';
    protected $fillable=[
        'descricao',
    ]
}
