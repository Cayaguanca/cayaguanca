<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\HasProfilePhoto;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Usuarios extends Component
{
    use WithFileUploads;
    use HasProfilePhoto;
    use WithPagination;

    // Variables para controlar el modales
    public $modal = false, $edit = false, $delete = false;

    // Variables para los registros de usuarios
    //public $usuarios, 
    public $user_id, $nombres, $apellidos, $email, $old_password, $password, $role_id, $foto, $identificador, $foto_antigua;

    // Variables para los registros de roles
    public $roles, $nombre_rol;

    protected $listeners=[
        'actualizar' => 'render',
        'eliminar' => 'deleteUser'//recibir la confirmación de la alerta para eliminar
    ];

    protected $rules = [
        'nombres' => 'required',
        'apellidos' => 'required',
        'email' => 'required|email',
        'password' => 'required',
        'role_id' => 'required',
        'foto' => 'image|mimes:image/jpeg,image/jpg,image/png'
    ];

    protected $messages = [
        'nombres.required' => 'Debe ingresar al menos un nombre.',
        'apellidos.required' => 'Debe ingresar al menos un apellido.',
        'email.required' => 'Debe ingresar un correo electrónico.',
        'email.email' => 'El formato del correo electrónico no es válido.',
        'password.required' => 'Debe ingresar una contraseña.',
        'role_id.required' => 'Debe seleccionar un rol.',
        'foto.image' => 'El archivo debe ser una imagen.',
        'foto.mimes' => 'La foto debe ser jpg, jpeg o png'
    ];

    public function mount() {
        $this->modal = false;
        $this->edit = false;
        $this->delete = false;
        $this->identificador = rand();
    }

    public function render()
    {
        //$this->usuarios = User::all();
        $this->roles = Role::all();

        return view('livewire.usuarios.usuarios', [
            'usuarios' => User::paginate(5)
        ]);
    }

    public function save() {
        $id = $this->user_id;
        
        if($this->edit) {
            if($this->password == '') {
                $this->password = $this->old_password;
            } else {
                $new_password = $this->password;
                $this->password = Hash::make($new_password);
            }
        } else {
            $this->password = Hash::make($this->password);
            $this->validate();
        }
        $user = User::updateOrCreate(['id' => $id], [
            'name' => $this->nombres,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role_id,
            'file_name' => $this->foto == null ? null : $this->foto->getClientOriginalName(),
            'file_extension' => $this->foto == null ? null : $this->foto->extension(),
            'file_path' => $this->foto == null ? null : 'storage/' . $this->foto->store('profile', 'public'),
        ]);

        //dd($user);

        //$user->profile_photo_path = $ruta_foto;
        //$user->save();
        //$this->dispatchBrowserEvent('close-modal');
        $this->limpiarCampos();
        $this->identificador = rand();

        $this->dispatchBrowserEvent('swal:modal',[
        ]);
        //$this->dispatchBrowserEvent('closeModal');
    }

    public function show($id) {
        $this->user_id = $id;
        $user = User::findOrFail($id);
        $this->cerrarModal();
        $this->abrirModalEditar();
        $this->nombres = $user->name;
        $this->apellidos = $user->apellidos;
        $this->email = $user->email;
        $this->old_password = $user->password;
        $this->role_id = $user->role_id;
        $this->foto = $user->file_path;
        //dd($this->foto);
        $this->foto_antigua = $user->file_path;
    }

    public function delete($id) {
        $this->user_id = $id;
        $this->abrirModalEliminar();
    }

    public function deleteUser() {
        $usuario = User::findOrFail($this->user_id);
        $this->deleteFoto();
        $usuario->delete();
        $this->dispatchBrowserEvent('swal:delete',[
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
    }

    public function abrirModalEliminar() {
        $this->delete = true;
    }

    public function cerrarModalEliminar() {
        $this->delete = false;
    }

    public function limpiarCampos() {
        $modal = $this->modal;
        $edit = $this->edit;
        $delete = $this->delete;

        if($modal) {
            $this->modal = false;
        }

        if($edit) {
            $this->edit = false;
        }

        if($delete) {
            $this->delete = false;
        }

        $this->user_id = '';
        $this->nombres = '';
        $this->apellidos = '';
        $this->email = '';
        $this->password = '';
        $this->old_password = '';
        $this->role_id = '';
        $this->foto = '';
    }

    public function abrirModal()
    {
        $this->modal = true;
        $this->edit = false;
    }

    public function cerrarModal()
    {
        $this->modal = false;
    }

    public function abrirModalEditar()
    {
        $this->edit = true;
        $this->modal = false;
    }

    public function cerrarModalEditar() {
        $this->edit = false;
    }
}
