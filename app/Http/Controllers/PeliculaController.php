<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PeliculaController extends Controller
{
    public function listar(Request $request)
    {
        try {
            $perPage = (int) $request->input('per_page', 15);

            if ($perPage < 1) {
                $perPage = 15;
            }

            if ($perPage > 100) {
                $perPage = 100;
            }

            $q = Pelicula::query()
                ->select([
                    'id',
                    'titulo',
                    'slug',
                    'sinopsis_corta',
                    'anio_estreno',
                    'duracion',
                    'clasificacion_edad',
                    'idioma_original',
                    'pais_origen',
                    'director',
                    'productora',
                    'calificacion_promedio',
                    'popularidad',
                    'estado',
                    'fecha_estreno_streaming',
                    'plataforma',
                    'poster_url',
                ])
                ->orderBy('popularidad', 'desc')
                ->orderBy('titulo', 'asc');

            if ($request->filled('search')) {
                $term = trim((string) $request->input('search'));
                $like = '%'.$term.'%';

                $q->where(function ($sub) use ($like) {
                    $sub->where('titulo', 'like', $like)
                        ->orWhere('sinopsis_corta', 'like', $like)
                        ->orWhere('director', 'like', $like)
                        ->orWhere('productora', 'like', $like)
                        ->orWhere('pais_origen', 'like', $like)
                        ->orWhere('plataforma', 'like', $like);
                });
            }

            if ($request->filled('estado')) {
                $q->where('estado', trim((string) $request->input('estado')));
            }

            if ($request->filled('anio_estreno')) {
                $q->where('anio_estreno', (int) $request->input('anio_estreno'));
            }

            $p = $q->paginate($perPage);

            $items = $p->getCollection()->map(function (Pelicula $pelicula) {
                return [
                    'id' => $pelicula->id,
                    'titulo' => $pelicula->titulo,
                    'slug' => $pelicula->slug,
                    'sinopsis_corta' => $pelicula->sinopsis_corta,
                    'anio_estreno' => $pelicula->anio_estreno,
                    'duracion' => $pelicula->duracion,
                    'clasificacion_edad' => $pelicula->clasificacion_edad,
                    'idioma_original' => $pelicula->idioma_original,
                    'pais_origen' => $pelicula->pais_origen,
                    'director' => $pelicula->director,
                    'productora' => $pelicula->productora,
                    'calificacion_promedio' => $pelicula->calificacion_promedio,
                    'popularidad' => $pelicula->popularidad,
                    'estado' => $pelicula->estado,
                    'fecha_estreno_streaming' => $pelicula->fecha_estreno_streaming,
                    'plataforma' => $pelicula->plataforma,
                    'poster_url' => $pelicula->poster_url,
                ];
            })->values();

            return response()->json([
                'success' => true,
                'data' => [
                    'data' => $items,
                    'meta' => [
                        'current_page' => $p->currentPage(),
                        'last_page' => $p->lastPage(),
                        'per_page' => $p->perPage(),
                        'total' => $p->total(),
                        'from' => $p->firstItem(),
                        'to' => $p->lastItem(),
                    ],
                    'links' => [
                        'first' => $p->url(1),
                        'last' => $p->url($p->lastPage()),
                        'prev' => $p->previousPageUrl(),
                        'next' => $p->nextPageUrl(),
                    ],
                ],
            ]);
        } catch (\Throwable $e) {
            Log::error('Pelicula listar error', ['error' => $e->getMessage()]);

            return response()->json([
                'success' => false,
                'message' => 'No se pudo cargar el listado.',
            ], 500);
        }
    }
}