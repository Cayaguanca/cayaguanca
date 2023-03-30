<?php

namespace App\Http\Livewire\Suscriptores;

use App\Models\Suscriptor;
use Livewire\Component;

class Suscriptores extends Component
{
    public $search='';

    public function render()
    {
        return view('livewire.suscriptores.suscriptores',[
            'suscriptores'=>Suscriptor::orderBy('created_at','desc')->where('email','LIKE','%'.$this->search.'%')->paginate(5),
        ]);
    }
}
