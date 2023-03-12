<?php

namespace App\Http\Livewire\Galerias;

use App\Models\MediaProyecto;
use Livewire\Component;
use App\Models\Proyecto;
use Livewire\WithFileUploads;
class Galerias extends Component
{
    use WithFileUploads;

    public $galeria_proyecto,$files=[],$id_proyecto,$id_file, $img,$direccion, $search, $identificador, $identificador2;
    public function render()
    {
        $this->galeria_proyecto = Proyecto::with(['media_proyecto'])->get();
        //dd($this->galeria_proyecto);
        $this->find();
        return view('livewire.galerias.galerias');
    }

    public function mount()
    {
        $this->identificador = rand();
        $this->identificador2 = rand();
    }

    public function save_id($id){
        $this->files = array();
        $this->id_proyecto=$id;
    }
    public function save_img(){
        foreach ($this->files as $key => $file){
            $file_save = new MediaProyecto();
            
            $file_save->file_name = $file->getClientOriginalName();
            $file_save->file_extension = $file->extension();
            $file_save->file_path = 'storage/' . $file->store('file', 'public');
            $file_save->proyecto_id = $this->id_proyecto;

            $file_save->save();
            $this->identificador=rand();
        }
    }
    public function id_img($id){
        //$this->direccion='';
        $this->id_file=$id;
        $this->img = MediaProyecto::find($this->id_file);
        $this->direccion = $this->img->file_path;
        //dd($this->direccion);
        
    }

    public function delete_img(){
        MediaProyecto::findOrFail($this->id_file)->delete();
        $this->direccion='';
        $this->id_file='';
        $this->img = '';
        $this->identificador2=rand();

    }

    public function find(){
        $this->galeria_proyecto = Proyecto::where('nombre_proyecto','LIKE','%'.$this->search.'%')
                                                ->with(['media_proyecto'])->get();
        //dd($this->galeria_proyecto);
    }
}
