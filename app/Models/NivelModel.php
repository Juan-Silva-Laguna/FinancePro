<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NivelModel extends Model
{
    use HasFactory;

    protected $table = "niveles";
    protected $primaryKey = "id";

    protected $fillable = ['nombre', 'descripcion', 'img', 'precio'];

    public $timestamps = false;
}
