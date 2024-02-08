<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\LibroModel;
use App\Models\LikeLibroModel;
use App\Models\LibroVistoModel;

class LibrosController extends Controller
{
    public function index() {
        $libros = DB::table('libros AS l')
            ->select('l.*', 'lb.id AS like')
            ->leftJoin('likes_libros AS lb', function($join) {
                $join->on('l.id', '=', 'lb.id_libro')
                    ->where('lb.id_usuario', '=', auth()->user()->id);
            })
            ->paginate(30, ['*'], 'page', 0);


        return view('libros.index', ['libros' => $libros]);

    }

    public function lista() {
        $libros = DB::table('libros AS l')
            ->select('l.*', 'lb.id AS like')
            ->join('likes_libros AS lb', function($join) {
                $join->on('l.id', '=', 'lb.id_libro')
                    ->where('lb.id_usuario', '=', auth()->user()->id);
            })
            ->get();


        return view('libros.lista', ['libros' => $libros]);

    }

    public function leidos() {
        $libros = DB::table('libros AS l')
            ->select('l.*', 'lb.id AS like')
            ->leftJoin('likes_libros AS lb', function($join) {
                $join->on('l.id', '=', 'lb.id_libro')
                    ->where('lb.id_usuario', '=', auth()->user()->id);
            })
            ->join('libros_vistos AS lv', function($join) {
                $join->on('l.id', '=', 'lv.id_libro')
                    ->where('lv.id_usuario', '=', auth()->user()->id);
            })
            ->get();
        return view('libros.lista', ['libros' => $libros]);

    }



    public function buscar(Request $request)
    {
        $agnos = $request->agnos;
        $pagina = $request->page;
        $busquedas = $request->busquedas;

        $idUsuario = auth()->user()->id;
        $libros = LibroModel::leftJoin('likes_libros', function($join) use ($idUsuario) {
            $join->on('libros.id', '=', 'likes_libros.id_libro')
                ->where('likes_libros.id_usuario', '=', $idUsuario);
        })
        ->select('libros.*','likes_libros.id AS like');


        if ($busquedas) {
            $libros->where(function ($query) use ($busquedas) {
                foreach ($busquedas as $busqueda) {
                    $query->orWhere(DB::raw("CONCAT(libros.nombre, ' ', libros.autor, ' ', libros.descripcion)"), 'like', '%' . $busqueda . '%');
                }
            });
        }

        if ($agnos) {
            $libros->whereIn('libros.agno', $agnos);
        }

        $result = $libros->paginate(30, ['*'], 'page', $pagina);

        // return view('libros.index', ['libros' => $result, 'agnos' => $agnos, 'busquedas' => $busquedas]);
        return response()->json(['libros' => $result]);
    }

    //LIKES <3
    function like($id) {
        // Encuentra la libro por su ID
        $libro = LibroModel::find($id);

        // Verifica si la libro existe
        if (!$libro) {
            return redirect()->route('libros.index')->with('error', 'La libro no existe.');
        }

        $like = LikeLibroModel::where('id_usuario', auth()->user()->id)->where('id_libro', $id)->first();

        if ($like!=null) {
            //likeMenos
            LikeLibroModel::where('id_usuario', auth()->user()->id)->where('id_libro', $id)->delete();
        }else{
            //likeMas
            LikeLibroModel::create([
                'id_libro' => $id,
                'id_usuario' => auth()->user()->id,
            ]);
        }
        return $libro;
        // return response()->json(['message' => 'success']);
    }

    //LIBROS VISTOS
    function libroVisto($id, $pagina) {
        $libro = LibroVistoModel::where('id_usuario', auth()->user()->id)->where('id_libro', $id)->first();
        if ($pagina != "null") {
            if ($libro!=null) {
                //actualizaPagina
                $libro->update([
                    'pagina' => $pagina,
                ]);
            }else{
                //guardaPagina
                $libro = LibroVistoModel::create([
                    'id_libro' => $id,
                    'id_usuario' => auth()->user()->id,
                    'pagina' => $pagina
                ]);
            }
        }
        return $libro->pagina;
        // return response()->json(['message' => 'success']);
    }


    public function show($id) {

        $libro = LibroModel::find($id);

        // Verifica si El libro existe
        if (!$libro) {
            return redirect()->route('libros.index')->with('error', 'El libro no existe.');
        }
        return view('libros.show', ['libro' => $libro]);
    }
}
