<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonioController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\JuegosController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/complete-register', [App\Http\Controllers\Auth\RegisterController::class, 'ViewCompleteRegister'])->name('complete-register');

Route::get('/register/{codigo_registro}', [App\Http\Controllers\Auth\RegisterController::class, 'ViewRegister'])->name('register-code');


Route::middleware(['auth'])->group(function () {
    Route::get('/testimonios', [TestimonioController::class, 'index'])->name('testimonios.index');
    Route::get('/testimonios/cargar-mas-publicaciones', [TestimonioController::class, 'cargarMasPublicaciones'])->name('testimonios.cargar');
    Route::post('/testimonios', [TestimonioController::class, 'store'])->name('testimonios.store');
    Route::get('/testimonios/{id}/edit', [TestimonioController::class, 'edit'])->name('testimonios.edit');
    Route::put('/testimonios/{id}', [TestimonioController::class, 'update'])->name('testimonios.update');
    Route::delete('/testimonios/{id}', [TestimonioController::class, 'destroy'])->name('testimonios.destroy');

    Route::get('/testimonios/like/{id}', [TestimonioController::class, 'like'])->name('like');

    Route::post('/testimonios/add_comentario/{id}', [TestimonioController::class, 'addComentario'])->name('comentarios.add');
    Route::delete('/testimonios/delete_comentario/{id}', [TestimonioController::class, 'deleteComentario'])->name('comentarios.destroy');

    Route::get('/testimonios/show/{id}', [TestimonioController::class, 'mostrarTestimonio'])->name('testimonios.show');


    Route::get('/testimonios/propios', [TestimonioController::class, 'misTestimonios'])->name('testimonios.mios');
    Route::get('/testimonios/me_gustaron', [TestimonioController::class, 'meGustaron'])->name('testimonios.me_gustaron');

    //CURSOS
    Route::get('/cursos', [CursosController::class, 'index'])->name('cursos.index');
    Route::get('/ver_curso/{id}', [CursosController::class, 'show'])->name('curso.ver');
    Route::get('/cursos/check_video/{id}', [CursosController::class, 'checkVideo'])->name('check.video');

    //PELICULAS
    Route::get('/peliculas', [PeliculasController::class, 'index'])->name('peliculas.index');
    Route::get('/peliculas/ver/{codigo}', [PeliculasController::class, 'ver'])->name('peliculas.ver');
    Route::post('/peliculas/buscar', [PeliculasController::class, 'buscar'])->name('peliculas.buscar');
    Route::post('/peliculas/filtrar', [PeliculasController::class, 'filtrar'])->name('peliculas.filtrar');

    Route::get('/peliculas/like/{id}', [PeliculasController::class, 'like'])->name('like.peliculas');
    Route::get('/peliculas/playlist/{id}', [PeliculasController::class, 'playlist'])->name('playlist.peliculas');

    //--------falta ajustar los filtros para estas vistas
    Route::get('/peliculas/mi_lista', [PeliculasController::class, 'buscarMiLista'])->name('peliculas.mi_lista');
    Route::get('/peliculas/me_gustan', [PeliculasController::class, 'buscarMeGustan'])->name('peliculas.me_gustan');

    //LIBROS
    Route::get('/libros/ver/{id}', [LibrosController::class, 'show'])->name('libros.ver');
    Route::get('/libros', [LibrosController::class, 'index'])->name('libros.index');
    Route::post('/libros/buscar', [LibrosController::class, 'buscar'])->name('libros.buscar');
    Route::get('/libros/like/{id}', [LibrosController::class, 'like'])->name('like.libros');
    Route::get('/libros/visto/{id}/{pagina}', [LibrosController::class, 'libroVisto'])->name('visto.libros');
    Route::get('/libros/mi_lista', [LibrosController::class, 'lista'])->name('libros.lista');
    Route::get('/libros/iniciados', [LibrosController::class, 'leidos'])->name('libros.leidos');


    //JUEGOS
    Route::get('/juegos', [JuegosController::class, 'index'])->name('juegos.index');
    Route::get('/juegos/panel/{juego}', [JuegosController::class, 'panel'])->name('juegos.panel');
    Route::get('/juegos/emojis', [JuegosController::class, 'emojisIndex'])->name('juegos.emojis');

    Route::get('/juegos/puzzle1', [JuegosController::class, 'puzzle1Index'])->name('juegos.puzzle1');
    Route::get('/juegos/puzzle2', [JuegosController::class, 'puzzle2Index'])->name('juegos.puzzle2');
    Route::get('/juegos/sudoku', [JuegosController::class, 'sudokuIndex'])->name('juegos.sudoku');
    Route::get('/juegos/ahorcado', [JuegosController::class, 'ahorcadoIndex'])->name('juegos.ahorcado');
    Route::get('/juegos/ajedrez', [JuegosController::class, 'ajedrezIndex'])->name('juegos.ajedrez');
    Route::get('/juegos/bloques', [JuegosController::class, 'bloquesIndex'])->name('juegos.bloques');
    Route::get('/juegos/bola_color', [JuegosController::class, 'bolaColorIndex'])->name('juegos.bola_color');
    Route::get('/juegos/descubre_camino', [JuegosController::class, 'descubreCaminoIndex'])->name('juegos.descubre_camino');

    // Route::post('/juegos/emojis', [JuegosController::class, 'emojis'])->name('juegos.emojis');

});




