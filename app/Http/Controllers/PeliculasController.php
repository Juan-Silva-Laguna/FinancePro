<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NivelModel;
use App\Models\ListaPeliculaModel;
use App\Models\LikePeliculaModel;
use App\Models\CategoriaPeliculaModel;
use App\Models\PeliculaModel;
use App\Models\TopPeliculaModel;

class PeliculasController extends Controller
{
    public function index()
    {
        // Carrusel
        $carrusel = TopPeliculaModel::select('peliculas.*')
            ->join('peliculas', 'top_peliculas.id_pelicula', '=', 'peliculas.id')
            ->inRandomOrder()
            ->limit(6)
            ->get();

        // Top 10
        $top_10 = TopPeliculaModel::select('peliculas.*')
            ->join('peliculas', 'top_peliculas.id_pelicula', '=', 'peliculas.id')
            ->orderBy('puesto')
            ->take(10)
            ->get();

        // Categorías con Películas
        $data = [];
        $categorias = CategoriaPeliculaModel::get();
        $idUsuario = auth()->user()->id;

        foreach ($categorias as $categoria) {
                $peliculas = PeliculaModel::leftJoin('likes_peliculas', function($join) use ($idUsuario) {
                    $join->on('peliculas.id', '=', 'likes_peliculas.id_pelicula')
                        ->where('likes_peliculas.id_usuario', '=', $idUsuario);
                })
                ->leftJoin('lista_peliculas', function($join) use ($idUsuario) {
                    $join->on('peliculas.id', '=', 'lista_peliculas.id_pelicula')
                        ->where('lista_peliculas.id_usuario', '=', $idUsuario);
                })
                ->select('peliculas.*',
                DB::raw('IF(likes_peliculas.id_usuario IS NOT NULL, 1, 0) as usuario_en_like'),
                DB::raw('IF(lista_peliculas.id_usuario IS NOT NULL, 1, 0) as pelicula_en_lista'))
                ->where('peliculas.id_categoria_peliculas', $categoria->id)
                ->inRandomOrder()
                ->take(15)
                ->get();

            array_push($data, ['categoria_name' => $categoria->nombre, 'categoria_id' => $categoria->id, 'categoria' => $categoria->nombre_alterno, 'peliculas' => $peliculas]);
        }

        return view('peliculas.peliculas', ['carrusel' => $carrusel, 'top_10' => $top_10, 'data' => $data]);
    }


    public function ver($codigo)
    {
        $idUsuario = auth()->user()->id;
        $pelicula = PeliculaModel::leftJoin('likes_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'likes_peliculas.id_pelicula')
                ->where('likes_peliculas.id_usuario', '=', $idUsuario);
        })
        ->leftJoin('lista_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'lista_peliculas.id_pelicula')
                ->where('lista_peliculas.id_usuario', '=', $idUsuario);
        })
        ->select('peliculas.*',
        DB::raw('IF(likes_peliculas.id_usuario IS NOT NULL, 1, 0) as usuario_en_like'),
        DB::raw('IF(lista_peliculas.id_usuario IS NOT NULL, 1, 0) as pelicula_en_lista'))
        ->where('peliculas.codigo', $codigo)->first();


        $peliculas = PeliculaModel::leftJoin('likes_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'likes_peliculas.id_pelicula')
                ->where('likes_peliculas.id_usuario', '=', $idUsuario);
        })
        ->leftJoin('lista_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'lista_peliculas.id_pelicula')
                ->where('lista_peliculas.id_usuario', '=', $idUsuario);
        })
        ->select('peliculas.*',
        DB::raw('IF(likes_peliculas.id_usuario IS NOT NULL, 1, 0) as usuario_en_like'),
        DB::raw('IF(lista_peliculas.id_usuario IS NOT NULL, 1, 0) as pelicula_en_lista'))
        ->where('peliculas.id_categoria_peliculas',  $pelicula->id_categoria_peliculas)
        ->where('peliculas.codigo', '<>', $codigo)
        ->inRandomOrder()
        ->take(15)
        ->get();

        $categoria = CategoriaPeliculaModel::find($pelicula->id_categoria_peliculas);

        return view('peliculas.show', ['pelicula' => $pelicula, 'peliculas' => $peliculas, 'categoria' => $categoria]);
    }

    public function buscar(Request $request)
    {
        $agnos = $request->agnos;
        $generos = $request->categorias;
        $texto = $request->texto;
        // $peliculas = new PeliculaModel;

        $idUsuario = auth()->user()->id;
        $peliculas = PeliculaModel::leftJoin('likes_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'likes_peliculas.id_pelicula')
                ->where('likes_peliculas.id_usuario', '=', $idUsuario);
        })
        ->leftJoin('lista_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'lista_peliculas.id_pelicula')
                ->where('lista_peliculas.id_usuario', '=', $idUsuario);
        })
        ->select('peliculas.*',
        DB::raw('IF(likes_peliculas.id_usuario IS NOT NULL, 1, 0) as usuario_en_like'),
        DB::raw('IF(lista_peliculas.id_usuario IS NOT NULL, 1, 0) as pelicula_en_lista'))
        ->where(function ($query) use ($texto) {
            $query->whereRaw("CONCAT(peliculas.nombre, ' ', peliculas.descripcion) LIKE ?", ['%' . $texto . '%']);
        });

        if ($agnos) {
            $peliculas->whereIn('peliculas.agno', $agnos);
        }

        if ($generos) {
            $peliculas->whereIn('peliculas.id_categoria_peliculas', $generos);
        }

        $result = $peliculas->get();

        $categorias = CategoriaPeliculaModel::select('nombre','id')->get();

        return view('peliculas.buscador', ['titulo' => $texto ,'peliculas' => $result, 'categorias' => $categorias, 'agnos' => $agnos, 'id_genero' => $generos[0], 'genero' => $request->categoria_name]);
    }
    public function buscarMiLista()
    {
        $idUsuario = auth()->user()->id;
        $peliculas = PeliculaModel::leftJoin('likes_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'likes_peliculas.id_pelicula')
                ->where('likes_peliculas.id_usuario', '=', $idUsuario);
        })
        ->join('lista_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'lista_peliculas.id_pelicula')
                ->where('lista_peliculas.id_usuario', '=', $idUsuario);
        })
        ->select('peliculas.*',
        DB::raw('IF(likes_peliculas.id_usuario IS NOT NULL, 1, 0) as usuario_en_like'),
        DB::raw('IF(lista_peliculas.id_usuario IS NOT NULL, 1, 0) as pelicula_en_lista'));

        $result = $peliculas->get();

        $categorias = CategoriaPeliculaModel::select('nombre','id')->get();

        return view('peliculas.buscador', ['titulo' => '' ,'genero' => 'Mi Lista','id_genero' => ''  ,'peliculas' => $result, 'categorias' => $categorias]);
    }

    public function buscarMeGustan()
    {
        $idUsuario = auth()->user()->id;
        $peliculas = PeliculaModel::join('likes_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'likes_peliculas.id_pelicula')
                ->where('likes_peliculas.id_usuario', '=', $idUsuario);
        })
        ->leftJoin('lista_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'lista_peliculas.id_pelicula')
                ->where('lista_peliculas.id_usuario', '=', $idUsuario);
        })
        ->select('peliculas.*',
        DB::raw('IF(likes_peliculas.id_usuario IS NOT NULL, 1, 0) as usuario_en_like'),
        DB::raw('IF(lista_peliculas.id_usuario IS NOT NULL, 1, 0) as pelicula_en_lista'));

        $result = $peliculas->get();

        $categorias = CategoriaPeliculaModel::select('nombre','id')->get();

        return view('peliculas.buscador', ['titulo' => '' ,'genero' => 'Me Gustan','id_genero' => ''  ,'peliculas' => $result, 'categorias' => $categorias]);
    }

    public function filtrar(Request $request)
    {
        $agnos = $request->agnos;
        $generos = $request->categorias;
        $texto = $request->texto;

        $idUsuario = auth()->user()->id;
        $peliculas = PeliculaModel::leftJoin('likes_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'likes_peliculas.id_pelicula')
                ->where('likes_peliculas.id_usuario', '=', $idUsuario);
        })
        ->leftJoin('lista_peliculas', function($join) use ($idUsuario) {
            $join->on('peliculas.id', '=', 'lista_peliculas.id_pelicula')
                ->where('lista_peliculas.id_usuario', '=', $idUsuario);
        })
        ->select('peliculas.*',
        DB::raw('IF(likes_peliculas.id_usuario IS NOT NULL, 1, 0) as usuario_en_like'),
        DB::raw('IF(lista_peliculas.id_usuario IS NOT NULL, 1, 0) as pelicula_en_lista'))
        ->where(function ($query) use ($texto) {
            $query->whereRaw("CONCAT(peliculas.nombre, ' ', peliculas.descripcion) LIKE ?", ['%' . $texto . '%']);
        });

        if ($agnos) {
            $peliculas->whereIn('peliculas.agno', $agnos);
        }

        if ($generos) {
            $peliculas->whereIn('peliculas.id_categoria_peliculas', $generos);
        }

        $result = $peliculas->take(60)->get();
        // dd($peliculas->toSql());
        return response()->json(['peliculas' => $result]);
    }

    //LIKES <3
    function like($id) {
        // Encuentra la pelicula por su ID
        $pelicula = PeliculaModel::find($id);

        // Verifica si la pelicula existe
        if (!$pelicula) {
            return redirect()->route('peliculas.index')->with('error', 'La pelicula no existe.');
        }

        $like = LikePeliculaModel::where('id_usuario', auth()->user()->id)->where('id_pelicula', $id)->first();

        if ($like!=null) {
            //likeMenos
            $pelicula->update([
                'likes' => $pelicula->likes=$pelicula->likes-1,
            ]);

            LikePeliculaModel::where('id_usuario', auth()->user()->id)->where('id_pelicula', $id)->delete();
        }else{
            //likeMas
            $pelicula->update([
                'likes' => $pelicula->likes=$pelicula->likes+1,
            ]);

            LikePeliculaModel::create([
                'id_pelicula' => $id,
                'id_usuario' => auth()->user()->id,
            ]);
        }
        return $pelicula;
        // return response()->json(['message' => 'success']);
    }

    //PLAYLIST +
    function playlist($id) {
        // Encuentra la pelicula por su ID
        $pelicula = PeliculaModel::find($id);

        // Verifica si la pelicula existe
        if (!$pelicula) {
            return redirect()->route('peliculas.index')->with('error', 'La pelicula no existe.');
        }

        $like = ListaPeliculaModel::where('id_usuario', auth()->user()->id)->where('id_pelicula', $id)->first();

        if ($like!=null) {
            //likeMenos
            $pelicula->update([
                'likes' => $pelicula->likes=$pelicula->likes-1,
            ]);

            ListaPeliculaModel::where('id_usuario', auth()->user()->id)->where('id_pelicula', $id)->delete();
        }else{
            //likeMas
            $pelicula->update([
                'likes' => $pelicula->likes=$pelicula->likes+1,
            ]);

            ListaPeliculaModel::create([
                'id_pelicula' => $id,
                'id_usuario' => auth()->user()->id,
            ]);
        }
        return $pelicula;
        // return response()->json(['message' => 'success']);
    }

}
