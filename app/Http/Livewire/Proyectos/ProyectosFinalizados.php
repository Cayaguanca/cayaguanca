<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProyectosFinalizados extends Component
{
    public $proyectos = [];
    public function render()
    {
        return view('livewire.proyectos.proyectos-finalizados');
    }

    public function mount() {
        $this->proyectos = Proyecto::with(['media_proyecto'])->take(5)->get();
    }
}
