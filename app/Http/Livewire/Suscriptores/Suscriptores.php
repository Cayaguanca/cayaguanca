<?php

namespace App\Http\Livewire\Suscriptores;

use App\Models\Suscriptor;
use Livewire\Component;
use Livewire\WithPagination;

class Suscriptores extends Component
{
    //public $suscriptores;
    use WithPagination;

    public function render()
    {
        return view('livewire.suscriptores.suscriptores', [
            'suscriptores' => Suscriptor::paginate(5)
        ]);
    }
    public function mount() {
        //$this->suscriptores = Suscriptor::all();
    }
}
