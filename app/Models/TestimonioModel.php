<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestimonioModel extends Model
{
    use HasFactory;

    protected $table = "testimonios";
    protected $primaryKey = "id";

    protected $fillable = [
        'imagen', 'descripcion', 'likes', 'comentarios', 'id_usuario'
    ];

    public function comentariosUlt()
    {
        return $this->hasMany(ComentariosTestimonioModel::class, 'id_testimonio', 'id');
    }

    public $timestamps = false;
}
