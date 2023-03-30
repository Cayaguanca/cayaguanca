<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

use Livewire\Component;

class Perfil extends Component
{
    use WithFileUploads;
    use HasProfilePhoto;

    protected $listeners=[
        'eliminar' => 'deleteFoto'//recibir la confirmación de la alerta para eliminar
    ];
    public $role, $usuario, $user_id, $nombres, $apellidos, $email, $foto, $foto_antigua;
    public function render()
    {
        $users = auth()->user()->id;
        $this->usuario = User::findOrFail($users);
        $this->role = Role::findOrFail($this->usuario->id);
        return view('livewire.usuarios.perfil');
    }
    protected $rules = [
        'nombres'=>'required|max:50',
        'apellidos'=>'required|max:50',
        'foto' => 'mimes:pdf,jpg,jpeg,png',
        
    ];
    protected $messages = [
        'nombres.required' => 'Debe Ingresar los nombres del administrador',
        'nombres.max' => 'El maximo de caracteres para los nombre son 50',
        'apellidos.required' => 'Debe Ingresar los apellidos del administrador',
        'apellidos.max' => 'El maximo de caracteres para los apellidos son 50',
    ];
    public function mount() {
        $users = auth()->user()->id;  
        $user = User::findOrFail($users);

        $this->user_id = $user->id;
        $this->nombres = $user->name;
        $this->apellidos = $user->apellidos;
        $this->email = $user->email;
        $this->foto = '';

    }
    public function save() {
        $id = $this->user_id;

        $this->validate();
        if($this->foto == ''){
            $usu = User::updateOrCreate(['id' => $id], [
                'name' => $this->nombres,
                'apellidos' => $this->apellidos,
            ]);
        }else{
            $usu = User::updateOrCreate(['id' => $id], [
                'name' => $this->nombres,
                'apellidos' => $this->apellidos,
                'file_name' => $this->foto->getClientOriginalName(),
                'file_extension' => $this->foto->extension(),
                'file_path' => 'storage/' . $this->foto->store('profile', 'public'),
            ]);
        }
        
        $usu->save();

        $this->dispatchBrowserEvent('swal:confirmacion',[
            'title' => 'Usuario Actualizado',
        ]);
    }
    public function delete($id){
        $this->user_id = $id;
        $this->dispatchBrowserEvent('swal:confirmarDelete',[
            'title' => '¿Seguro que desea eliminar la foto de perfil?',
        ]);    
    }
    public function deleteFoto() {
        $usuario = User::findOrFail($this->user_id);

        $url = str_replace('storage', 'public', $usuario->file_path);
        Storage::delete($url);

        $usuario->file_name = null;
        $usuario->file_extension = null;
        $usuario->file_path = null;
        $this->foto = null;

        $usuario->save();
        $this->dispatchBrowserEvent('swal:confirmacion',[
            'title' => 'Foto Eliminada correctamente',
        ]);
    }
}
