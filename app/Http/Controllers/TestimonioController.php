<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestimonioModel;
use App\Models\LikesTestimonioModel;
use App\Models\ComentariosTestimonioModel;


class TestimonioController extends Controller
{
    public function index()
    {
        $testimonios = TestimonioModel::select('testimonios.*', 'users.nombres', 'users.foto')
        ->orderBy('testimonios.id', 'desc')
        ->join('users', 'testimonios.id_usuario', '=', 'users.id')
        ->paginate(10, ['*'], 'page', 0);

        foreach ($testimonios as $testimonio) {
            $comentarios = ComentariosTestimonioModel::where('id_testimonio', $testimonio->id)
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();

            $testimonio->comentariosUlt = $comentarios;
        }


        // Obtener los usuarios que le han dado like a los testimonios
        $likesByTestimonio = LikesTestimonioModel::selectRaw('GROUP_CONCAT(id_testimonio) as mis_likes')
        ->where('id_usuario', auth()->user()->id)
        ->first();

        $likesData = explode(',', $likesByTestimonio->mis_likes);

        return view('testimonios', compact('testimonios', 'likesData'));
    }

    public function misTestimonios()
    {
        $testimonios = TestimonioModel::select('testimonios.*', 'users.nombres', 'users.foto')
        ->orderBy('testimonios.id', 'desc')
        ->join('users', 'testimonios.id_usuario', '=', 'users.id')
        ->where('testimonios.id_usuario', auth()->user()->id)
        ->paginate(10, ['*'], 'page', 0);

        foreach ($testimonios as $testimonio) {
            $comentarios = ComentariosTestimonioModel::where('id_testimonio', $testimonio->id)
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();

            $testimonio->comentariosUlt = $comentarios;
        }

        // Obtener los usuarios que le han dado like a los testimonios
        $likesByTestimonio = LikesTestimonioModel::selectRaw('GROUP_CONCAT(id_testimonio) as mis_likes')
        ->where('id_usuario', auth()->user()->id)
        ->first();

        $likesData = explode(',', $likesByTestimonio->mis_likes);

        return view('testimonios', compact('testimonios', 'likesData'));
    }

    public function meGustaron()
    {
        $testimonios = TestimonioModel::select('testimonios.*', 'users.nombres', 'users.foto')
        ->orderBy('testimonios.id', 'desc')
        ->join('users', 'testimonios.id_usuario', '=', 'users.id')
        ->join('likes_testimonio', 'testimonios.id', '=', 'likes_testimonio.id_testimonio')
        ->where('likes_testimonio.id_usuario', auth()->user()->id)
        ->paginate(10, ['*'], 'page', 0);

        foreach ($testimonios as $testimonio) {
            $comentarios = ComentariosTestimonioModel::where('id_testimonio', $testimonio->id)
                ->orderBy('id', 'desc')
                ->take(3)
                ->get();

            $testimonio->comentariosUlt = $comentarios;
        }


        // Obtener los usuarios que le han dado like a los testimonios
        $likesByTestimonio = LikesTestimonioModel::selectRaw('GROUP_CONCAT(id_testimonio) as mis_likes')
        ->where('id_usuario', auth()->user()->id)
        ->first();

        $likesData = explode(',', $likesByTestimonio->mis_likes);

        return view('testimonios', compact('testimonios', 'likesData'));
    }

    public function cargarMasPublicaciones(Request $request)
    {
        $page = $request->get('page');

        $testimonios = TestimonioModel::orderBy('testimonios.id', 'desc')->join('users', 'testimonios.id_usuario', '=', 'users.id')->paginate(10, ['*'], 'page', $page);
        // Obtener los usuarios que le han dado like a los testimonios
        $likesByTestimonio = LikesTestimonioModel::selectRaw('GROUP_CONCAT(id_testimonio) as mis_likes')
        ->where('id_usuario', auth()->user()->id)
        ->first();

        $likesData = explode(',', $likesByTestimonio->mis_likes);
        return view('cargar-mas-publicaciones', compact('testimonios', 'likesData'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required',
            'imagen' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Define image upload validation rules.
        ]);

        if ($request->hasFile('imagen')) {
            $image = $request->file('imagen');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = null; // Set a default image if no image is provided.
        }

        TestimonioModel::create([
            'imagen' => $imageName,
            'descripcion' => $request->input('descripcion'),
            'likes' => 0,
            'id_usuario' => auth()->user()->id, // Assuming you have user authentication
        ]);

        return redirect()->route('testimonios.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required',
        ]);

        $testimonio = TestimonioModel::find($id);
        $testimonio->update([
            'descripcion' => $request->input('descripcion'),
        ]);

        return $testimonio;
    }

    public function destroy($id)
    {
        // Encuentra el testimonio por su ID
        $testimonio = TestimonioModel::find($id);

        // Verifica si el testimonio existe
        if (!$testimonio) {
            return redirect()->route('testimonios.index')->with('error', 'El testimonio no existe.');
        }

        // Obtiene la ruta de la imagen a eliminar
        $imagenPath = public_path('images/' . $testimonio->imagen);

        // Verifica si la imagen existe en el sistema de archivos
        if ($testimonio->imagen != null && file_exists($imagenPath)) {
            unlink($imagenPath);
        }

        $testimonio->delete();
        return $testimonio;
    }

    //LIKES <3
    function like($id) {
        // Encuentra el testimonio por su ID
        $testimonio = TestimonioModel::find($id);

        // Verifica si el testimonio existe
        if (!$testimonio) {
            return redirect()->route('testimonios.index')->with('error', 'El testimonio no existe.');
        }

        $like = LikesTestimonioModel::where('id_usuario', auth()->user()->id)->where('id_testimonio', $id)->first();

        if ($like!=null) {
            //likeMenos
            $testimonio->update([
                'likes' => $testimonio->likes=$testimonio->likes-1,
            ]);

            LikesTestimonioModel::where('id_usuario', auth()->user()->id)->where('id_testimonio', $id)->delete();
        }else{
            //likeMas
            $testimonio->update([
                'likes' => $testimonio->likes=$testimonio->likes+1,
            ]);

            LikesTestimonioModel::create([
                'id_testimonio' => $id,
                'id_usuario' => auth()->user()->id,
            ]);
        }
        return $testimonio;
        // return response()->json(['message' => 'success']);
    }

    //COMENTARIOS

    public function addComentario(Request $request, $id)
    {
        // Encuentra el testimonio por su ID
        $testimonio = TestimonioModel::find($id);

        // Verifica si el testimonio existe
        if (!$testimonio) {
            return redirect()->route('testimonios.index')->with('error', 'El testimonio no existe.');
        }

        $testimonio->update([
            'comentarios' => $testimonio->comentarios=$testimonio->comentarios+1,
        ]);

        $comment = ComentariosTestimonioModel::create([
            'descripcion' => $request->input('comentario'),
            'id_testimonio' => $id,
            'id_usuario' => auth()->user()->id,
        ]);

        return response()->json(['comentario' => $comment]);
    }

    public function deleteComentario($id)
    {
        // Encuentra el testimonio por su ID
        $comentario = ComentariosTestimonioModel::find($id);

        // Verifica si el comentario existe
        if (!$comentario) {
            return redirect()->route('testimonio.index')->with('error', 'El comentario no existe.');
        }

        $testimonio = TestimonioModel::find($comentario->id_testimonio);
        $testimonio->update([
            'comentarios' => $testimonio->comentarios=$testimonio->comentarios-1,
        ]);


        $comentario->delete();

        return response()->json(['success' => 1]);
    }

    //SOLO UN TESTIMONIO
    public function mostrarTestimonio($id)
    {
        $testimonio = TestimonioModel::select('testimonios.*', 'users.nombres', 'users.foto')
        ->orderBy('testimonios.id', 'desc')
        ->join('users', 'testimonios.id_usuario', '=', 'users.id')
        ->where('testimonios.id',$id)
        ->first();

        $testimonio->comentariosUlt = ComentariosTestimonioModel::where('id_testimonio', $id)
        ->orderBy('id', 'desc')
        ->get();

        $testimonio->likesUlt = LikesTestimonioModel::where('id_testimonio', $id)
        ->orderBy('id', 'desc')
        ->get();

        // Obtener los usuarios que le han dado like a los testimonios
        $likesByTestimonio = LikesTestimonioModel::selectRaw('GROUP_CONCAT(id_testimonio) as mis_likes')
        ->where('id_usuario', auth()->user()->id)
        ->first();

        $likesData = explode(',', $likesByTestimonio->mis_likes);

        return view('testimonio', compact('testimonio', 'likesData'));
    }
}
