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
    
            array_push($data, ['categoria' => $categoria->nombre_alterno, 'peliculas' => $peliculas]);
        }
    
        return view('peliculas.peliculas', ['carrusel' => $carrusel, 'top_10' => $top_10, 'data' => $data]);
    }
    

    public function ver($codigo)
    {
        $pelicula = PeliculaModel::where('codigo', $codigo)->first();

    
        $peliculas = PeliculaModel::orderBy('popularidad', 'DESC')
            ->where('id_categoria_peliculas', $pelicula->id_categoria_peliculas)
            ->take(35)
            ->get();

        return view('peliculas.show', ['pelicula' => $pelicula, 'peliculas' => $peliculas]);
    }

    public function buscar(Request $request)
    {
        $agnos = $request->agnos;
        $generos = $request->categorias;
        $texto = $request->texto;

        $peliculas = new PeliculaModel;

        if ($agnos) {
            $peliculas->whereIn('agno', $agnos);
        }

        if ($generos) {
            $peliculas->whereIn('id_categoria_peliculas', $generos);
        }

        $result = $peliculas->where('nombre', 'LIKE', '%' . $texto . '%')
                            ->orWhere('descripcion', 'LIKE', '%' . $texto . '%')
                            ->get();
        
        $categorias = CategoriaPeliculaModel::select('nombre','id')->get();

        return view('peliculas.buscador', ['titulo' => $texto ,'peliculas' => $result, 'categorias' => $categorias, 'agnos' => $agnos, 'generos' => $generos]);
    }

    public function filtrar(Request $request)
    {
        $agnos = $request->agnos;
        $generos = $request->categorias;
        $texto = $request->texto;

        $peliculas =  PeliculaModel::where(function ($query) use ($texto) {
            $query->whereRaw("CONCAT(nombre, ' ', descripcion) LIKE ?", ['%' . $texto . '%']);
        });

        if ($agnos) {
            $peliculas->whereIn('agno', $agnos);
        }

        if ($generos) {
            $peliculas->whereIn('id_categoria_peliculas', $generos);
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
