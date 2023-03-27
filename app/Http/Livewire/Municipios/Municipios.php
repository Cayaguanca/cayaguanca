<?php

namespace App\Http\Livewire\Municipios;

use App\Models\Municipio;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
class Municipios extends Component
{
    use WithFileUploads;
    
    public $municipios;
    public $municipio_id,$nombre_municipio,$codigo_postal,$escudo
    ,$fecha_afiliacion,$descripcion_municipio;
    public $file_name,$file_extension,$file_path,$foto_direccion,$identificador;
    public $modal = false;

    protected $listeners=[
        'eliminar' => 'delete_now'//recibir la confirmación de la alerta para eliminar
    ];

    protected $rules = [
        'nombre_municipio' => 'required',
        'codigo_postal' => 'required',
        'escudo' => 'mimes:pdf,jpg,jpeg,png',
        'fecha_afiliacion' => 'required',
        'descripcion_municipio' => 'required',
    ];

    public function mount(){
        //$this->middleware('guest');
        $this->identificador = rand();
    }

    public function render()
    {
        $this->municipios = Municipio::all();

        //dd($this->municipios);
        return view('livewire.municipios.municipios');
    }
    public function save(){
        $this->validate();

        $id = $this->municipio_id;
        if($this->escudo == ''){
            $newMunicipio = Municipio::updateOrCreate(['id'=>$id],[
                'nombre_municipio' => $this->nombre_municipio,
                'codigo_postal' => $this->codigo_postal,
                'fecha_afiliacion' => $this->fecha_afiliacion,
                'descripcion_municipio' => $this->descripcion_municipio
            ]);    
        }else{
            $url = str_replace('storage', 'public', $this->foto_direccion);
            Storage::delete($url);
            $newMunicipio = Municipio::updateOrCreate(['id'=>$id],[
                'nombre_municipio' => $this->nombre_municipio,
                'codigo_postal' => $this->codigo_postal,
                'file_name'=> $this->escudo->getClientOriginalName(),
                'file_extension' => $this->escudo->extension(),
                'file_path' => 'storage/' . $this->escudo->store('file', 'public'),
                'fecha_afiliacion' => $this->fecha_afiliacion,
                'descripcion_municipio' => $this->descripcion_municipio
            ]);
        }
        $newMunicipio->save();
        $this->limpiarCampo();
        $this->dispatchBrowserEvent('swal:confirmacion',[
            'title' => 'Municipio Guardado con exito'
        ]);
        //return session()->flash("success", "This is success message");
    }
    public function abrirModal()
    {
        $this->modal=true;
    }
    public function cerrarModal()
    {
        $this->modal = false;
    }
    public function limpiarCampo(){
        $this->municipio_id='';
        $this->nombre_municipio='';
        $this->codigo_postal='';
        $this->escudo='';
        $this->fecha_afiliacion='';
        $this->descripcion_municipio='';
    }
    public function editar($id){
        $this->limpiarCampo();
        $municipioEdit = Municipio::findOrFail($id);
        $this->municipio_id = $municipioEdit->id;
        $this->nombre_municipio = $municipioEdit->nombre_municipio;
        $this->codigo_postal = $municipioEdit->codigo_postal;
        $this->foto_direccion = $municipioEdit->file_path;
        //dd($this->escudo);
        $this->fecha_afiliacion = $municipioEdit->fecha_afiliacion;
        $this->descripcion_municipio = $municipioEdit->descripcion_municipio;
        
        $this->abrirModal();
        $this->identificador = rand();
    }

    public function delete($id){
        $this->municipio_id=$id;
        $this->dispatchBrowserEvent('swal:confirmarDelete',[
            'title' => '¿Seguro que desea eliminar el municipio?',
        ]);    
    }
    public function delete_now(){
        Municipio::find($this->municipio_id)->delete();
    }
    

}
