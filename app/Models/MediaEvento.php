<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaEvento extends Model
{
    use HasFactory;

    protected $table = 'media_evento';

    protected $fillable = [
        'file_name',
        'file_extension',
        'file_path',
        'evento_id'
    ];

    public function evento() {
        return $this->belongsTo(Evento::class);
    }
}
