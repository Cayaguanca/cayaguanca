<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\Municipio;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ProyectosFinalizados extends Component
{
    public $proyectos = [], $municipios = [], $busqueda_nombre, $busqueda_municipios;
    public function render()
    {
        $this->proyectos = Proyecto::with(['media_proyecto', 'municipios'])
                            ->orderBy('fecha_final', 'desc')
                            ->get();
        $this->municipios = Municipio::all();
        //dd($this->proyectos);
        $this->getProyectosNombres();
        if($this->busqueda_municipios)
            $this->getProyectosMunicipios();
        return view('livewire.proyectos.proyectos-finalizados');
    }

    public function getProyectosNombres() {
        $this->proyectos = Proyecto::where('nombre_proyecto','LIKE','%'.$this->busqueda_nombre.'%')
                                    ->with(['media_proyecto'])
                                    ->orderBy('fecha_final', 'desc')
                                    ->get();
    }

    public function getProyectosMunicipios() {
        $this->proyectos = Proyecto::with(['media_proyecto', 'municipios'])->whereHas('municipios', function($query) {
            $query->where('municipios.id', $this->busqueda_municipios);
        })->orderBy('fecha_final', 'desc')->get();
        //dd($this->proyectos);
    }
}
