<?php

namespace App\Http\Livewire\Galerias;

use App\Models\MediaProyecto;
use App\Models\MediaEvento;
use Livewire\Component;
use App\Models\Proyecto;
use App\Models\Evento;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Galerias extends Component
{
    use WithFileUploads;

    public $galeria_proyecto,$galeria_evento,$files=[],$id_proyecto,$id_file,
    $img,$direccion, $search, $identificador, $identificador2, $id_evento;


    public function render()
    {
        $this->galeria_proyecto = Proyecto::with(['media_proyecto'])->get();
        $this->galeria_evento = Evento::with(['media_eventos'])->get();
        //dd($this->galeria_evento);
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
    public function save_id_evento($id){
        
        $this->files = array();
        $this->id_evento = $id;
    }
    public function save_img_eve(){
        foreach ($this->files as $key => $file){
            $file_save = new MediaEvento();
            
            $file_save->file_name = $file->getClientOriginalName();
            $file_save->file_extension = $file->extension();
            $file_save->file_path = 'storage/' . $file->store('file', 'public');
            $file_save->evento_id = $this->id_evento;

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
        $this->delete_foto_pro();
        MediaProyecto::findOrFail($this->id_file)->delete();
        $this->direccion='';
        $this->id_file='';
        $this->img = '';
        $this->identificador2=rand();
        

    }
    public function delete_foto_pro()
    {
        $file = MediaProyecto::findOrFail($this->id_file);
        $url = str_replace('storage', 'public', $file->file_path);
        Storage::delete($url);
        $file->save();
    }

    public function id_img_eve($id){
        //$this->direccion='';
        
        $this->id_file=$id;
        $this->img = MediaEvento::find($this->id_file);
        $this->direccion = $this->img->file_path;
        //dd($this->direccion);
        
    }

    public function delete_img_eve(){
        $this->delete_foto_eve();
        MediaEvento::findOrFail($this->id_file)->delete();
        $this->direccion='';
        $this->id_file='';
        $this->img = '';
        $this->identificador2=rand();
        
    }

    public function delete_foto_eve(){
        $file = MediaEvento::findOrFail($this->id_file);
        $url = str_replace('storage', 'public', $file->file_path);
        Storage::delete($url);
        $file->save();
    }

    public function find(){
        $this->galeria_proyecto = Proyecto::where('nombre_proyecto','LIKE','%'.$this->search.'%')
        ->with(['media_proyecto'])->get();
        $this->galeria_evento = Evento::where('nombre_evento','LIKE','%'.$this->search.'%')
        ->with(['media_eventos'])->get();
    }
}
