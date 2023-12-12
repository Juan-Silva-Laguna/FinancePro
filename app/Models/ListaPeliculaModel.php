<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ListaPeliculaModel extends Model
{
    protected $table = 'lista_peliculas';

    protected $fillable = [
        'id_usuario',
        'id_pelicula',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }

    public $timestamps = false;

}
