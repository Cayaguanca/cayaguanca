<?php

namespace App\Http\Livewire\Nosotros;

use App\Models\Municipio;
use Livewire\Component;

class Acerca extends Component
{
    public $municipios, $fotos = [];
    
    public function render()
    {
        
        $this->municipios = Municipio::all();
        foreach($this->municipios as $municipio) {
            array_push($this->fotos, $municipio->file_path);

        }

        return view('livewire.nosotros.acerca');
    }
}
