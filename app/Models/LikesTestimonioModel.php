<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikesTestimonioModel extends Model
{
    use HasFactory;

    protected $table = "likes_testimonio";
    protected $primaryKey = "id";

    protected $fillable = [
        'id_usuario','id_testimonio'
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'id_usuario', 'id');
    }
    
    public $timestamps = false;
}
