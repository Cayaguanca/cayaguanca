<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaProyecto extends Model
{
    use HasFactory;
    protected $table = 'media_proyectos';

    protected $fillable = [
        'file_name',
        'file_extension',
        'file_path',
        'proyecto_id'
    ];

    public function proyecto() {
        return $this->belongsTo(Proyecto::class);
    }
}
