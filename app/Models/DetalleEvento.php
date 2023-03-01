<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEvento extends Model
{
    use HasFactory;

    protected $table = 'detalle_eventos';

    protected $fillable = [
        'fecha_evento',
        'direccion_evento'
    ];

    public function eventos() {
        return $this->belongsToMany(Enveto::class);
    }
}
