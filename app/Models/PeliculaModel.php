<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PeliculaModel extends Model
{
    protected $table = 'peliculas';

    protected $fillable = [
        'nombre',
        'descripcion',
        'imagen_v',
        'video',
        'agno',
        'etiquetas',
        'imagen_h',
        'likes',
        'duracion',
        'id_categoria_peliculas',
        'codigo',
    ];
    
    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(CategoriaPelicula::class, 'id_categoria_peliculas');
    }
}
