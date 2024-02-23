<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;
use App\Models\PuntajeModel;
use phpseclib\Crypt\RSA;

class JuegosController extends Controller
{
    public function index() {
        return view('juegos.index');
    }

    public function panel($juego) {
        $puntaje = PuntajeModel::where('id_usuario', auth()->user()->id)->first();
        return view('juegos.panel', ['puntaje' => $puntaje,'juego' => $juego]);
    }

    public function emojisIndex() {
        return view('juegos.emojis');
    }

    public function puzzle1Index() {
        $imagenes = [
            "https://th.bing.com/th/id/OIG1.RzCF73nf3vdvhZvShXnw?w=1024&h=1024&rs=1&pid=ImgDetMain",
            "https://th.bing.com/th/id/OIG2.LXt4Ooo.p5EUFyuITtV.?w=1024&h=1024&rs=1&pid=ImgDetMain",
            "https://th.bing.com/th/id/OIG2.22q_EZ4f4J5zxiYkhzUi?w=1024&h=1024&rs=1&pid=ImgDetMain"
        ];

        $indice_aleatorio = array_rand($imagenes);

        // Obtiene la URL aleatoria utilizando el índice obtenido
        $imagen = $imagenes[$indice_aleatorio];
        return view('juegos.puzzle1', ['imagen' => $imagen]);
    }

}
