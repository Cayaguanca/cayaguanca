<?php

namespace App\Http\Livewire\Index;

use App\Models\Evento;
use App\Models\Proyecto;
use Livewire\Component;

class Welcome extends Component
{
    public $proyectos, $eventos;

    public function render()
    {
        $this->proyectos = Proyecto::with('media_proyecto')->take(6)->get();
        $this->eventos = Evento::take(6)->get();

        return view('livewire.index.welcome');
    }
}
