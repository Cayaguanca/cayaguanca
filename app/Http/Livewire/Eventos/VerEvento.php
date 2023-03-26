<?php

namespace App\Http\Livewire\Eventos;

use App\Models\Evento;
use App\Models\MediaEvento;
use Livewire\Component;

class VerEvento extends Component
{

    public $media, $evento, $detalle_evento, $municipio_evento, $detallesAdd=[];

    public function mount($id)
    {
        $this->evento = Evento::findOrFail($id);
        $evento = Evento::where('id','=',$id)->with(['municipios'])->with(['detalle_eventos'])->get();
        $detalle = $evento[0]->detalle_eventos;
        $municipio = $evento[0]->municipios;
        $ids = 0;
        foreach($detalle as $key => $detalles){
            array_push($this->detallesAdd,array(
                'id' => $detalles->id,
                'direccion_evento' => $detalles->direccion_evento,
                'fecha' => $detalles->fecha_evento,
                'municipio' => $municipio[$ids]->nombre_municipio
            ));
            $ids += 1;
        }
        $this->media = MediaEvento::where('evento_id',$id)->get();
        
        //dd($this->media);
    }
    public function render()
    {
        return view('livewire.eventos.ver-evento');
    }

}
