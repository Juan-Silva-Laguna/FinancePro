<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoCursoVistoModel extends Model
{
    use HasFactory;

    protected $table = "videos_cursos_vistos";
    protected $primaryKey = "id";

    protected $fillable = ['id_video_curso', 'id_usuario'];

    public $timestamps = false;
}
