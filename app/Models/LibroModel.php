<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibroModel extends Model
{
    use HasFactory;

    protected $table = "libros";
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre', 'descripcion', 'libro', 'agno', 'autor', 'imagen',
    ];

    public $timestamps = false;
}
