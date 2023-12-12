<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoriaPeliculaModel extends Model
{
    protected $table = 'categorias_peliculas';

    protected $fillable = [
        'nombre',
        'nombre_alterno',
        'popularidad',
    ];

    public $timestamps = false; 
}
