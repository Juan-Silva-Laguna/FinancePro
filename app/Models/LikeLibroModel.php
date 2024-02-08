<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LikeLibroModel extends Model
{
    protected $table = 'likes_libros';

    protected $fillable = [
        'id_usuario',
        'id_libro',
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
