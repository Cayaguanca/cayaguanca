<?php

namespace App\Http\Livewire\Donantes;

use App\Models\Donante;
use Livewire\Component;

class Donantes extends Component
{
    public $donantes;

    public function render()
    {
        return view('livewire.donantes.donantes');
    }

    public function mount() {
        $this->donantes = Donante::all();
    }
}
