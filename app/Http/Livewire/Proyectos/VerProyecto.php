<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\MediaProyecto;
use App\Models\Proyecto;
use Livewire\Component;

class VerProyecto extends Component
{
    public $media, $proyecto, $detalle_evento, $municipio_evento, $detallesAdd=[],$donantes;

    public function mount($id)
    {
        $this->proyecto = Proyecto::findOrFail($id);
        $proyecto = Proyecto::where('id','=',$id)->with(['donantes'])->with(['municipios'])->with(['detalle_proyectos'])->get();
        //dd($proyecto);
        $this->donantes = $proyecto[0]->donantes;
        //dd($this->donantes);
        

        
        //dd($proyecto[0]->donantes);
        $detalle = $proyecto[0]->detalle_proyectos;
        $municipio = $proyecto[0]->municipios;
        $ids = 0;
        foreach($detalle as $key => $detalles){
            array_push($this->detallesAdd,array(
                'id' => $detalles->id,
                'direccion_proyecto' => $detalles->direccion_proyecto,
                'fecha' => $detalles->fecha_actividad,
                'municipio' => $municipio[$ids]->nombre_municipio
            ));
            $ids += 1;
        }
        $this->media = MediaProyecto::where('proyecto_id',$id)->get();
        
        //dd($this->media);
    }
    public function render()
    {
        return view('livewire.proyectos.ver-proyecto');
    }
}
