<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopPeliculaModel extends Model
{
    use HasFactory;

    protected $table = "top_peliculas";
    protected $primaryKey = "id";

    protected $fillable = ['id_puesto', 'id_pelicula'];

    // Relación con el modelo Pelicula
    public function pelicula()
    {
        return $this->belongsTo(Pelicula::class, 'id_pelicula');
    }

    public $timestamps = false;
}
