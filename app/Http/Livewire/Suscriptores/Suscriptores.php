<?php

namespace App\Http\Livewire\Suscriptores;

use App\Models\Suscriptor;
use Livewire\Component;

class Suscriptores extends Component
{
    public $suscriptores;

    public function render()
    {
        return view('livewire.suscriptores.suscriptores');
    }
    public function mount() {
        $this->suscriptores = Suscriptor::all();
    }
}
