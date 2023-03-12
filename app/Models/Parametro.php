<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parametro extends Model
{
    protected $table='parametro';
    
    use HasFactory;
    public function dimensao(){
        return $this->hasOne(dimensao::class,'id','dimensao_id');
    }
}
