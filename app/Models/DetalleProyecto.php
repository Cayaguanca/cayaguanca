<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleProyecto extends Model
{
    use HasFactory;

    protected $table = 'detalle_proyectos';

    protected $fillable = [
        'direccion_proyecto',
        'fecha_actividad'
    ];

    public function proyectos() {
        return $this->belongsToMany(Proyecto::class);
    }
}
