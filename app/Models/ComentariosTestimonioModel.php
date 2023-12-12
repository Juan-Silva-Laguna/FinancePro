<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ComentariosTestimonioModel extends Model
{
    use HasFactory;

    protected $table = "comentarios_testimonio";
    protected $primaryKey = "id";

    protected $fillable = [
        'descripcion','id_usuario','id_testimonio'
    ];

    // En el modelo ComentariosTestimonioModel
    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }

    public $timestamps = false;
}
