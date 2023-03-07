<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;
    //use InteractsWithMedia;
    
    protected $table = 'eventos';

    protected $fillable= [
        'nombre_evento',
        'descripcion_evento',
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

    public function detalle_eventos() {
        return $this->belongsToMany(DetalleEvento::class);
    }

    public function media_eventos() {
        return $this->hasMany(MediaEvento::class);
    }
}
