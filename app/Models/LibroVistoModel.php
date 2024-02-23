<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LibroVistoModel extends Model
{
    protected $table = 'libros_vistos';

    protected $fillable = [
        'id_usuario',
        'id_libro',
        'pagina'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario');
    }

    public function libro()
    {
        return $this->belongsTo(Libro::class, 'id_libro');
    }

    public $timestamps = false;

}
