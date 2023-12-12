<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\NivelModel;
use App\Models\CursoModel;
use App\Models\VideoCursoModel;
use App\Models\VideoCursoVistoModel;

class CursosController extends Controller
{
    public function index()
    {
        $basico = DB::table('cursos AS c')
            ->select('c.id AS id_curso', 'c.imagen AS imagen_curso', 'c.nombre AS nombre_curso', DB::raw('COUNT(vc.id) AS total_videos'), DB::raw('COUNT(vcv.id_usuario) AS progreso'), DB::raw('ROUND((COUNT(vcv.id_usuario) / COUNT(vc.id)) * 100) AS porcentaje_progreso'))
            ->leftJoin('videos_cursos AS vc', 'vc.id_curso', '=', 'c.id')
            ->leftJoin('videos_cursos_vistos AS vcv', function($join) {
                $join->on('vc.id', '=', 'vcv.id_video_curso')
                    ->where('vcv.id_usuario', '=', auth()->user()->id);
            })
            ->where('c.nivel_id', 1)
            ->groupBy('c.id', 'c.nombre', 'c.imagen')
            ->get();

        $intermedio = DB::table('cursos AS c')
            ->select('c.id AS id_curso', 'c.imagen AS imagen_curso', 'c.nombre AS nombre_curso', DB::raw('COUNT(vc.id) AS total_videos'), DB::raw('COUNT(vcv.id_usuario) AS progreso'), DB::raw('ROUND((COUNT(vcv.id_usuario) / COUNT(vc.id)) * 100) AS porcentaje_progreso'))
            ->leftJoin('videos_cursos AS vc', 'vc.id_curso', '=', 'c.id')
            ->leftJoin('videos_cursos_vistos AS vcv', function($join) {
                $join->on('vc.id', '=', 'vcv.id_video_curso')
                    ->where('vcv.id_usuario', '=', auth()->user()->id);
            })
            ->where('c.nivel_id', 2)
            ->groupBy('c.id', 'c.nombre', 'c.imagen')
            ->get();

        $avanzado = DB::table('cursos AS c')
            ->select('c.id AS id_curso', 'c.imagen AS imagen_curso', 'c.nombre AS nombre_curso', DB::raw('COUNT(vc.id) AS total_videos'), DB::raw('COUNT(vcv.id_usuario) AS progreso'), DB::raw('ROUND((COUNT(vcv.id_usuario) / COUNT(vc.id)) * 100) AS porcentaje_progreso'))
            ->leftJoin('videos_cursos AS vc', 'vc.id_curso', '=', 'c.id')
            ->leftJoin('videos_cursos_vistos AS vcv', function($join) {
                $join->on('vc.id', '=', 'vcv.id_video_curso')
                    ->where('vcv.id_usuario', '=', auth()->user()->id);
            })
            ->where('c.nivel_id', 3)
            ->groupBy('c.id', 'c.nombre', 'c.imagen')
            ->get();

        $profesional = DB::table('cursos AS c')
            ->select('c.id AS id_curso', 'c.imagen AS imagen_curso', 'c.nombre AS nombre_curso', DB::raw('COUNT(vc.id) AS total_videos'), DB::raw('COUNT(vcv.id_usuario) AS progreso'), DB::raw('ROUND((COUNT(vcv.id_usuario) / COUNT(vc.id)) * 100) AS porcentaje_progreso'))
            ->leftJoin('videos_cursos AS vc', 'vc.id_curso', '=', 'c.id')
            ->leftJoin('videos_cursos_vistos AS vcv', function($join) {
                $join->on('vc.id', '=', 'vcv.id_video_curso')
                    ->where('vcv.id_usuario', '=', auth()->user()->id);
            })
            ->where('c.nivel_id', 4)
            ->groupBy('c.id', 'c.nombre', 'c.imagen')
            ->get();

        return view('cursos.cursos', ['basico' => $basico, 'intermedio' => $intermedio, 'avanzado' => $avanzado, 'profesional' => $profesional]);
    }

    public function show($id)
    {
        $curso = DB::table('cursos AS c')
            ->select(DB::raw('COUNT(vc.id) AS total_videos'), DB::raw('COUNT(vcv.id_usuario) AS progreso'), 'c.nombre AS nombre_curso', DB::raw('ROUND((COUNT(vcv.id_usuario) / COUNT(vc.id)) * 100) AS porcentaje_progreso'))
            ->leftJoin('videos_cursos AS vc', 'vc.id_curso', '=', 'c.id')
            ->leftJoin('videos_cursos_vistos AS vcv', function($join) {
                $join->on('vc.id', '=', 'vcv.id_video_curso')
                    ->where('vcv.id_usuario', '=', auth()->user()->id); // Reemplaza 1 con el ID del usuario deseado
            })
            ->where('c.id', '=', $id)
            ->groupBy('c.nombre')
            ->first();

        $data = DB::table('videos_cursos AS vc')
        ->select(
            'vc.id',
            'vc.nombre AS titulo',
            'vc.descripcion',
            'vc.tipo',
            'vc.contenido',
            'vcv.id_usuario AS visto'
        )
        ->leftJoin('videos_cursos_vistos AS vcv', function ($join) {
            $join->on('vc.id', '=', 'vcv.id_video_curso')
                ->where('vcv.id_usuario', '=', auth()->user()->id);
        })
        ->where('vc.id_curso', $id)
        ->get();
        
        return view('cursos.contenido', ['data' => $data, 'curso'=> $curso]);
    }

    function checkVideo($id) {
        // Encuentra el testimonio por su ID
        $video = VideoCursoModel::find($id);

        // Verifica si el testimonio existe
        if (!$video) {
            return redirect()->route('testimonios.index')->with('error', 'El video no existe.');
        }

        $video_visto = VideoCursoVistoModel::where('id_usuario', auth()->user()->id)->where('id_video_curso', $id)->first();
        
        if ($video_visto!=null) {
            //quitar
            $video['checked'] = false;
            VideoCursoVistoModel::where('id_usuario', auth()->user()->id)->where('id_video_curso', $id)->delete();
        }else{
            //agregar
            $video['checked'] = true;
            VideoCursoVistoModel::create([
                'id_video_curso' => $id,
                'id_usuario' => auth()->user()->id, 
            ]);
        }
        return $video;
        // return response()->json(['message' => 'success']);
    }
}
