<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    //use InteractsWithMedia;

    protected $table = 'proyectos';

    protected $fillable = [
        'nombre_proyecto',
        'descripcion_proyecto',
        'fecha_inicio',
        'fecha_final',
    ];

    /*public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            //->width(368)
            //->height(232)
            //->sharpen(10);
    }*/

    public function donantes() {
        return $this->belongsToMany(Donante::class);
    }

    public function municipios() {
        return $this->belongsToMany(Municipio::class);
    }

    public function detalle_proyectos() {
        return $this->belongsToMany(DetalleProyecto::class);

    }public function media_proyecto() {
        return $this->hasMany(MediaProyecto::class);
    }
}
