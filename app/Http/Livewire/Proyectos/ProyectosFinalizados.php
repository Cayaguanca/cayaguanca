<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Municipio;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProyectosFinalizados extends Component
{
    public $proyectos = [], $municipios = [], $fotos = [];
    public function render()
    {
        $count = 0;
        //$url = '';

        $this->proyectos = Proyecto::with(['media_proyecto'])->get();
        foreach($this->proyectos as $proyecto) {
            foreach($proyecto->media_proyecto as $media) {
                $count = 1;
                //$url = str_replace('storage', 'public', $media->file_path);
                array_push($this->fotos, $media->file_path);

                if($count == 1)
                    break;
            }
            $count = 0;
            //$url = '';
        }

        //dd($this->fotos[$this->proyectos[0]->id - 1]);

        $this->municipios = Municipio::all();

        return view('livewire.proyectos.proyectos-finalizados');
    }
}
