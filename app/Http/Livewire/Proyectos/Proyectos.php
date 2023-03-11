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

class Proyectos extends Component
{
    use WithFileUploads;
    
    //valiables
    public $modal=false;
    public $detallesAdd=[],$donanteAdd=[],$municipiosAdd=[];
    //variables de tabla proyectos
    public $proyectos, $id_proyecto, $nombre_proyecto, $descripcion_proyecto, $fecha_inicio,$fecha_final;

    //variables de tabla detalle_proyecto
    public $id_detalle_proyecto,$direccion_proyecto,$fecha_actividad, $atach_detalle=[];

    //variables de tabla donante_proyecto
    public  $donantes,$proyectoDon_id,$donante_id, $atach_donante=[];

    //variables de tabla municipio_proyecto
    public $municipios,$proyectoMun_id, $municipio_id, $atach_municipio=[];

    //variables de tabla media_proyecto
    public $file_name,$file_extension,$file_path,$proyectoImg_id,$files=[],$img;

    public function mount(){

    }
    public function render()
    {
        $this->proyectos = Proyecto::all();
        $this->municipios = Municipio::all();
        $this->donantes = Donante::all();

        return view('livewire.proyectos.proyectos');
    }

    public function save(){
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
            //$manupulator = new ImageManipulator($file);
            //$this->resizeImage($file);
            
            $file_save->file_name = $file->getClientOriginalName();
            $file_save->file_extension = $file->extension();
            $file_save->file_path = 'storage/' . $file->store('file', 'public')->resize(200,200);
            $file_save->proyecto_id = $new_proyecto->id;

            $file_save->save();
        }
        //dd($this->detallesAdd);
        $new_proyecto->detalle_proyectos()->attach($this->atach_detalle);
        $new_proyecto->municipios()->attach($this->atach_municipio);
        $new_proyecto->donantes()->attach($this->atach_donante);
    }
    public function resizeImage($image) { 
        $this->img = Image::make($image);
        $this->img->resize(200, 200); 
        $this->img->save(); 
    }
    public function save_detalle_proyecto(){
        $new_detalle = new DetalleProyecto();

        $new_detalle->direccion_proyecto = $this->direccion_proyecto;
        $new_detalle->fecha_actividad = $this->fecha_actividad;
        $new_detalle->save();
        
        array_push($this->atach_detalle,$new_detalle->id);
        array_push($this->detallesAdd,DetalleProyecto::findOrFail($new_detalle->id));
        //dd($this->detallesAdd);
        
        array_push($this->atach_municipio,$this->municipio_id);
        array_push($this->municipiosAdd,Municipio::findOrFail($this->municipio_id));
        
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

    public function delete_detalle(){

    }

    public function delete_donante(){

    }
}
