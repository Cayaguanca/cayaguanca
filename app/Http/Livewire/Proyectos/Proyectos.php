<?php

namespace App\Http\Livewire\Proyectos;

use App\Models\DetalleProyecto;
use App\Models\Donante;
use Livewire\Component;
use App\Models\MediaProyecto;
use App\Models\Municipio;
use App\Models\Proyecto;

use Livewire\WithFileUploads;
use Intervention\Image\ImageManagerStatic as Image; 
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithPagination;
class Proyectos extends Component
{
    use WithFileUploads;
    use WithPagination;
    //valiables
    public $modal=false;
    public $detallesAdd=[],$donanteAdd=[],$municipiosAdd=[],$identificador_detalle, $identificador;
    //variables de tabla proyectos
    public  $id_proyecto, $nombre_proyecto, $descripcion_proyecto, $fecha_inicio,$fecha_final;

    //variables de tabla detalle_proyecto
    public $id_detalle_proyecto,$direccion_proyecto,$fecha_actividad, $atach_detalle=[];

    //variables de tabla donante_proyecto
    public  $donantes,$proyectoDon_id,$donante_id, $atach_donante=[];

    //variables de tabla municipio_proyecto
    public $municipios,$proyectoMun_id, $municipio_id, $atach_municipio=[];

    //variables de tabla media_proyecto
    public $file_name,$file_extension,$file_path,$proyectoImg_id,$files=[],$img;


    //variables para paginacion 
    public $perPage = 10, $search='';
    //$pagination = true;

    protected $rules = [
        'nombre_proyecto' => 'required',
        'descripcion_proyecto' => 'required',
        'fecha_inicio' => 'required',
        'fecha_final' => 'required',
        //'direccion_proyecto' => 'required',
        //'fecha_actividad'=>'required',
        //'municipio_id' => 'required',
        //'donante_id' => 'required',
        //'files' => 'mimes:pdf,jpg,jpeg,png',
    ];

    
    protected $listeners=[
        'eliminar' => 'delete_now'//recibir la confirmación de la alerta para eliminar
    ];

    public function mount(){
        $this->identificador_detalle=rand();
        $this->identificador=rand();
        
    }
    public function render()
    {
        
        $this->municipios = Municipio::all();
        $this->donantes = Donante::all();
        
        
        return view('livewire.proyectos.proyectos',[
            'proyectos' => Proyecto::orderBy('created_at','desc')->where('nombre_proyecto','LIKE','%'.$this->search.'%')->paginate(5),
        ]);
    }

    public function save(){
        $this->validate();
        $id = $this->id_proyecto;
        $this->abrirModal();
        $new_proyecto = Proyecto::updateOrCreate(['id' => $id],[
            'nombre_proyecto' => $this->nombre_proyecto,
            'descripcion_proyecto' => $this->descripcion_proyecto,
            'fecha_inicio' => $this->fecha_inicio,
            'fecha_final' => $this->fecha_final
        ]);
        foreach ($this->files as $key => $file){
            $file_save = new MediaProyecto();

            
            $file_save->file_name = $file->getClientOriginalName();
            $file_save->file_extension = $file->extension();
            $file_save->file_path = 'storage/' . $file->store('file', 'public');
            $file_save->proyecto_id = $new_proyecto->id;

            $file_save->save();
        }
        
        $new_proyecto->detalle_proyectos()->attach($this->atach_detalle);
        $new_proyecto->municipios()->attach($this->atach_municipio);
        $new_proyecto->donantes()->attach($this->atach_donante);

        $this->limpiar_campos();
        $this->id_proyecto = '';
        $this->dispatchBrowserEvent('swal:confirmacion',[
            'title' => 'Programa Guardado con exito'
        ]);
    }

    public function save_detalle_proyecto(){
        $new_detalle = new DetalleProyecto();

        $new_detalle->direccion_proyecto = $this->direccion_proyecto;
        $new_detalle->fecha_actividad = $this->fecha_actividad;
        $new_detalle->save();
        

        $var = DetalleProyecto::findOrFail($new_detalle->id);
        $var2 = Municipio::findOrFail($this->municipio_id);
        
        array_push($this->atach_detalle,$new_detalle->id);
        array_push($this->atach_municipio,$this->municipio_id);
        array_push($this->detallesAdd,array(
            'id' => $var->id,
            'direccion_proyecto' => $var->direccion_proyecto,
            'fecha' => $var->fecha_actividad,
            'municipio' => $var2->nombre_municipio
        ));

    }

    public function save_donante(){
        array_push($this->atach_donante,$this->donante_id);
        $var = Donante::findOrFail($this->donante_id);
        array_push($this->donanteAdd,array(
            'donante_proyecto_id' => '',
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


        DetalleProyecto::findOrFail($id)->delete();
        
    }

    public function delete_donante($id){
        $key = array_search($id,array_column($this->donanteAdd,'id'));
        //dd($key);
        //Eliminar relacion buscar funcion 
        //DB::table('donante_proyecto')->where('id','=',$id)->delete();
        array_splice($this->atach_donante,$key,1);
        array_splice($this->donanteAdd,$key,1);
    }

    public function limpiar_campos(){
        $this->atach_detalle = array();
        $this->atach_donante = array();
        $this->atach_municipio = array();
        $this->detallesAdd = array();
        $this->donanteAdd = array();
        $this->nombre_proyecto = '';
        $this->descripcion_proyecto = '';
        $this->fecha_inicio = '';
        $this->fecha_final = '';
    }
    public function edit_proyecto($id){
        $this->limpiar_campos();
        $this->id_proyecto = $id;
        $proyecto = Proyecto::where('id','=',$id)->with(['municipios'])->with(['detalle_proyectos'])->get();
        //dd($proyecto[0]);
        $this->nombre_proyecto = $proyecto[0]->nombre_proyecto;
        $this->descripcion_proyecto = $proyecto[0]->descripcion_proyecto;
        $this->fecha_inicio = $proyecto[0]->fecha_inicio;
        $this->fecha_final = $proyecto[0]->fecha_final;

        $detalle = $proyecto[0]->detalle_proyectos;
        $municipio = $proyecto[0]->municipios;
        $donante = DB::table('donante_proyecto')->join('donantes','donantes.id','=','donante_proyecto.donante_id')
        ->select('donante_proyecto.id as donante_proye_id','donantes.id','donantes.nombre')
        ->where('donante_proyecto.proyecto_id','=',$id)->get();
        //dd($donante);

        $ids = 0;
        foreach($detalle as $key => $detalles){

            //array_push($this->atach_detalle, $detalles->id);
            //array_push($this->atach_municipio, $municipio[$id]->id);

            array_push($this->detallesAdd,array(
                'id' => $detalles->id,
                'direccion_proyecto' => $detalles->direccion_proyecto,
                'fecha' => $detalles->fecha_actividad,
                'municipio' => $municipio[$ids]->nombre_municipio
            ));
            $ids += 1;
        }

        foreach($donante as $key => $donantes){

            //array_push($this->atach_donante, $donantes->id);

            array_push($this->donanteAdd,array(
                'donante_proyecto_id' => $donantes->donante_proye_id,
                'id' => $donantes->id,
                'nombre' => $donantes->nombre
            ));

        }
    }
    public function delete_donante_proyecto($id,$donante){
        $key = array_search($id,array_column($this->donanteAdd,'id'));
        
        //Eliminar relacion buscar funcion 
        DB::table('donante_proyecto')->where('id','=',$donante)->delete();

        array_splice($this->donanteAdd,$key,1);
    }

    public function delete($id){
        $this->id_proyecto = $id;
        $this->dispatchBrowserEvent('swal:confirmarDelete',[
            'title' => '¿Seguro que desea eliminar el programa?',
        ]); 
    }

    public function delete_now(){
        $this->delete_fotos();
        Proyecto::findOrFail($this->id_proyecto)->delete();
    }

    public function delete_fotos()
    {
        $programa = Proyecto::where('id','=',$this->id_proyecto)->with(['media_proyecto'])->get();
        
        
        foreach($programa[0]->media_proyecto as $key => $foto){
            $imagen = MediaProyecto::findOrFail($foto->id);
            $url = str_replace('storage', 'public', $imagen->file_path);
            Storage::delete($url);
            $imagen->save();    
        }
    }
}
