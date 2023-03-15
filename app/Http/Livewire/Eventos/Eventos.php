<?php

namespace App\Http\Livewire\Eventos;

use App\Models\DetalleEvento;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Donante;
use App\Models\MediaProyecto;
use App\Models\Municipio;
use App\Models\Evento;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image; 

class Eventos extends Component
{
    use WithFileUploads;
    
    //valiables
    public $modal=false;
    public $detallesAdd=[], $donanteAdd=[], $municipiosAdd=[];
    //variables de tabla evento
    public $eventos, $id_evento, $nombre_evento, $descripcion_evento;

    //variables de tabla detalle de evento
    public $id_detalle_evento, $direccion_evento, $fecha_evento, $atach_detalle=[];

    //variables de tabla donante evento
    public  $donantes, $eventoDonante_id, $donante_id, $atach_donante=[];

    //variables de tabla municipio evento
    public $municipios, $eventoMunicipio_id, $municipio_id, $atach_municipio=[];

    //variables de tabla media evento
    public $file_name, $file_extension, $file_path, $eventoImg_id, $files=[],$img;


    protected $listeners=[
        'actualizar' => 'render',
    ];

    public function mount(){

        
        //array_push($this->e,$this->eventos[1]);
        $this->municipios = Municipio::all();
        $this->donantes = Donante::all();
    }
    public function render()
    {   
        $this->eventos = Evento::all();
        $this->municipios = Municipio::all();
        $this->donantes = Donante::all();
        $this->eventos = DB::table('eventos')->get();
        return view('livewire.eventos.eventos');
    }

    public function save(){
        $id = $this->id_evento;
        $this->abrirModal();
        $new_evento = Evento::updateOrCreate(['id' => $id],[
            'nombre_evento' => $this->nombre_evento,
            'descripcion_evento' => $this->descripcion_evento,
        ]);
        foreach ($this->files as $key => $file){
            $file_save = new MediaProyecto();
            
            $file_save->file_name = $file->getClientOriginalName();
            $file_save->file_extension = $file->extension();
            $file_save->file_path = 'storage/' . $file->store('file', 'public')->resize(200,200);
            $file_save->evento_id = $new_evento->id;

            $file_save->save();
        }
        $new_evento->detalle_eventos()->attach($this->atach_detalle);
        $new_evento->municipios()->attach($this->atach_municipio);
        $new_evento->donantes()->attach($this->atach_donante);

        $this->emitTo('eventos.tabla','actualizar');
    }
    public function resizeImage($image) { 
        $this->img = Image::make($image);
        $this->img->resize(200, 200); 
        $this->img->save(); 
    }
    public function save_detalle_evento(){
        $new_detalle = new DetalleEvento();

        $new_detalle->direccion_evento = $this->direccion_evento;
        $new_detalle->fecha_evento = $this->fecha_evento;
        $new_detalle->save();
        
        array_push($this->atach_detalle,$new_detalle->id);
        array_push($this->detallesAdd,DetalleEvento::findOrFail($new_detalle->id));
        
        array_push($this->atach_municipio,$this->municipio_id);
        array_push($this->municipiosAdd, Municipio::findOrFail($this->municipio_id));
        
    }

    public function save_donante(){
        array_push($this->atach_donante,$this->donante_id);
        array_push($this->donanteAdd,Donante::findOrFail($this->donante_id));
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
