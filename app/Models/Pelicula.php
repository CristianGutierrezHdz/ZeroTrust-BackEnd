<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    /**
     * The table associated with the model.
     */
    protected $table = 'peliculas';

    /**
     * The primary key for the model.
     */
    protected $primaryKey = 'id';

    /**
     * The columns that map to fecha_creacion / fecha_actualizacion instead
     * of the default created_at / updated_at names.
     */
    const CREATED_AT = 'fecha_creacion';
    const UPDATED_AT = 'fecha_actualizacion';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'titulo',
        'slug',
        'descripcion',
        'sinopsis_corta',
        'anio_estreno',
        'duracion',
        'clasificacion_edad',
        'idioma_original',
        'pais_origen',
        'director',
        'guionista',
        'productora',
        'presupuesto',
        'recaudacion',
        'calificacion_promedio',
        'total_votos',
        'popularidad',
        'estado',
        'fecha_estreno_streaming',
        'plataforma',
        'trailer_url',
        'poster_url',
        'fondo_url',
    ];

    /**
     * Attribute casting.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'anio_estreno'             => 'integer',
            'duracion'                 => 'integer',
            'presupuesto'              => 'decimal:2',
            'recaudacion'              => 'decimal:2',
            'calificacion_promedio'    => 'decimal:1',
            'total_votos'              => 'integer',
            'popularidad'              => 'decimal:2',
            'fecha_estreno_streaming'  => 'date',
            'fecha_creacion'           => 'datetime',
            'fecha_actualizacion'      => 'datetime',
        ];
    }

    /**
     * Scope for movies currently in theaters.
     */
    public function scopeEnCartelera($query)
    {
        return $query->where('estado', 'en cartelera');
    }

    /**
     * Scope for upcoming movies.
     */
    public function scopeProximas($query)
    {
        return $query->where('estado', 'proxima');
    }

    /**
     * Scope to order by popularity descending.
     */
    public function scopePopulares($query)
    {
        return $query->orderByDesc('popularidad');
    }
}
