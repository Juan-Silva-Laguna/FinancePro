<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuntajeModel extends Model
{
    use HasFactory;

    protected $table = "puntajes";
    protected $primaryKey = "id";

    protected $fillable = [
        'puntos','puntos_cifrados','puntos_anteriores','ultimo_tiempo','id_usuario'
    ];

    public $timestamps = false;
}
