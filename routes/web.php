<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestimonioController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\PeliculasController;
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



});




