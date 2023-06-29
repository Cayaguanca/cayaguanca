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
        $this->eventos = Evento::with('media_evento')->take(6)->get();

        //dd($this->eventos[0]->media_eventos);
        //dd(count($this->proyectos[0]->media_proyecto) != 0);

        return view('livewire.index.welcome')->layout('');
    }
}
