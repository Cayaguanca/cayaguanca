<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donante extends Model
{
    use HasFactory;

    protected $table = 'donantes';

    protected $fillable = [
        'nombre',
        'file_name',
        'file_extension',
        'file_path'
    ];

    public function eventos() {
        return $this->belongsToMany(Evento::class);
    }

    public function proyectos() {
        return $this->belongsToMany(Proyecto::class);
    }
}
