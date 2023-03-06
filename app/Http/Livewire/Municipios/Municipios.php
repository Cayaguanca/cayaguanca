<?php

namespace App\Http\Livewire\Municipios;

use App\Models\Municipio;
use Livewire\Component;
use Livewire\WithFileUploads;
class Municipios extends Component
{
    use WithFileUploads;
    
    public $municipios;
    public $nombre_municipio,$codigo_postal,$escudo
    ,$fecha_afiliacion,$descripcion_municipio;
    public $modal = false;

    protected $rules = [
        'nombre_municipio' => 'required',
        'codigo_postal' => 'required',
        'escudo' => 'mimes:pdf,jpg,jpeg,png',
        'fecha_afiliacion' => 'required',
        'descripcion_municipio' => 'required',
    ];

    public function mount(){
        $this->middleware('guest');
    }

    public function render()
    {
        $this->municipios = Municipio::all();

       //dd($this->municipios);
        return view('livewire.municipios.municipios');
    }
    public function save(){
        $this->validate();

        $newMunicipio = new Municipio();
        $newMunicipio->nombre_municipio = $this->nombre_municipio;
        $newMunicipio->codigo_postal = $this->codigo_postal;
        $newMunicipio->file_name = $this->escudo->getClientOriginalName();
        $newMunicipio->file_extension = $this->escudo->extension();
        $newMunicipio->file_path = 'storage/' . $this->escudo->store('file', 'public');
        $newMunicipio->fecha_afiliacion = $this->fecha_afiliacion;
        $newMunicipio->descripcion_municipio = $this->descripcion_municipio;
        $newMunicipio->save();

        return session()->flash("success", "This is success message");
    }
    public function abrirModal()
    {
        $this->modal=true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }


}
