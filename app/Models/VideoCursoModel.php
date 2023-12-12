<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCursoModel extends Model
{
    use HasFactory;

    protected $table = "videos_cursos";
    protected $primaryKey = "id";

    protected $fillable = ['nombre', 'contenido', 'id_curso', 'tipo', 'descripcion'];

    public $timestamps = false;
}
