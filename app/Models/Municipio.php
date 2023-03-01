<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    use HasFactory;
    protected $table = 'municipios';

    protected $fillable= [
        'nombre_municipio',
        'codigo_postal',
        'escudo',
        'fecha_afiliacion',
        'descripcion_municipio'
    ];

    public function eventos() {
        return $this->belongsToMany(Evento::class);
    }

    public function proyectos() {
        return $this->belongsToMany(Proyecto::class);
    }
}
