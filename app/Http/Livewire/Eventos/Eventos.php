<?php

namespace App\Http\Livewire\Eventos;

use App\Models\DetalleEvento;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Donante;
use App\Models\MediaEvento;
use App\Models\Municipio;
use App\Models\Evento;
use Composer\EventDispatcher\Event;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Livewire\WithPagination;

class Eventos extends Component
{
    use WithFileUploads;
    use WithPagination;
    
    //valiables
    public $modal=false;
    public $detallesAdd=[], $donanteAdd=[], $municipiosAdd=[];
    //variables de tabla evento
    public  $id_evento, $nombre_evento, $descripcion_evento;

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
        'eliminar' => 'delete_now'//recibir la confirmación de la alerta para eliminar
    ];

    public function mount(){
        $this->municipios = Municipio::all();
        $this->donantes = Donante::all();
    }
    public function render()
    {   
        //$this->eventos = Evento::orderBy('created_at','desc')->get();
        $this->municipios = Municipio::all();
        $this->donantes = Donante::all();

        return view('livewire.eventos.eventos',[
            'eventos'=>Evento::orderBy('created_at','desc')->paginate(5),
        ]);
    }

    public function save(){
        $id = $this->id_evento;
        $this->abrirModal();
        $new_evento = Evento::updateOrCreate(['id' => $id],[
            'nombre_evento' => $this->nombre_evento,
            'descripcion_evento' => $this->descripcion_evento,
        ]);
        foreach ($this->files as $key => $file){
            $file_save = new MediaEvento();
            
            $file_save->file_name = $file->getClientOriginalName();
            $file_save->file_extension = $file->extension();
            $file_save->file_path = 'storage/' . $file->store('file', 'public');
            $file_save->evento_id = $new_evento->id;

            $file_save->save();
        }
        $new_evento->detalle_eventos()->attach($this->atach_detalle);
        $new_evento->municipios()->attach($this->atach_municipio);
        $new_evento->donantes()->attach($this->atach_donante);

        $this->limpiar_campos();
        //Enviar alerta de evento actualizado correctamente
        $this->dispatchBrowserEvent('swal:confirmacion',[
            'title' => 'Evento Guardado con exito'
        ]);
        
    }

    public function save_detalle_evento(){
        $new_detalle = new DetalleEvento();

        $new_detalle->direccion_evento = $this->direccion_evento;
        $new_detalle->fecha_evento = $this->fecha_evento;
        $new_detalle->save();
        
        $var = DetalleEvento::findOrFail($new_detalle->id);
        $var2 = Municipio::findOrFail($this->municipio_id);
        
        array_push($this->atach_detalle,$new_detalle->id);
        array_push($this->atach_municipio,$this->municipio_id);
        array_push($this->detallesAdd,array(
            'id' => $var->id,
            'direccion_evento' => $var->direccion_evento,
            'fecha' => $var->fecha_evento,
            'municipio' => $var2->nombre_municipio
        ));

        
    }

    public function save_donante(){
        array_push($this->atach_donante,$this->donante_id);
        $var = Donante::findOrFail($this->donante_id);
        array_push($this->donanteAdd,array(
            'donante_evento_id' => '',
            'id' => $var->id,
            'nombre' => $var->nombre
        ));
    }

    public function abrirModal()
    {
        $this->modal=true;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function delete_detalle($id){
        $key = array_search($id,array_column($this->detallesAdd,'id'));
        
        array_splice($this->detallesAdd,$key,1);
        array_splice($this->atach_detalle,$key,1);
        array_splice($this->atach_municipio,$key,1);

        DetalleEvento::findOrFail($id)->delete();
        
    }

    public function delete_donante($id){
        $key = array_search($id,array_column($this->donanteAdd,'id'));
        array_splice($this->donanteAdd,$key,1);
        array_splice($this->atach_donante,$key,1);
    }

    public function limpiar_campos(){
        $this->atach_detalle = array();
        $this->atach_donante = array();
        $this->atach_municipio = array();
        $this->detallesAdd = array();
        $this->donanteAdd = array();
        $this->nombre_evento = '';
        $this->descripcion_evento = '';
        $this->fecha_evento = '';
        $this->id_evento = '';
    }

    public function edit_evento($id){
        $this->limpiar_campos();
        $this->id_evento = $id;
        $evento = Evento::where('id','=',$id)->with(['municipios'])->with(['detalle_eventos'])->get();
        $this->nombre_evento = $evento[0]->nombre_evento;
        $this->descripcion_evento = $evento[0]->descripcion_evento;
        $detalle = $evento[0]->detalle_eventos;
        $municipio = $evento[0]->municipios;
        $donante = DB::table('donante_evento')->join('donantes','donantes.id','=','donante_evento.donante_id')
        ->select('donante_evento.id as donante_event_id','donantes.id','donantes.nombre')
        ->where('donante_evento.evento_id','=',$id)->get();

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

        foreach($donante as $key => $donantes){
            array_push($this->donanteAdd,array(
                'donante_evento_id' => $donantes->donante_event_id,
                'id' => $donantes->id,
                'nombre' => $donantes->nombre
            ));

        }
    }

    public function delete_donante_evento($id, $donante){
        $key = array_search($id,array_column($this->donanteAdd,'id'));
        DB::table('donante_evento')->where('id','=',$donante)->delete();

        array_splice($this->donanteAdd,$key,1);
    }

    public function delete($id){
        $this->id_evento = $id;

        $this->dispatchBrowserEvent('swal:confirmarDelete',[
            'title' => '¿Seguro que desea eliminar el evento?',
        ]);    
    }

    public function delete_now(){
        $evento = Evento::where('id','=',$this->id_evento)->with(['detalle_eventos'])->get();
        $detalle = $evento[0]->detalle_eventos;
        Evento::findOrFail($this->id_evento)->delete();
        foreach($detalle as $detalleEvento){
            DetalleEvento::findOrFail($detalleEvento->id)->delete();
        }
            
    }

}
