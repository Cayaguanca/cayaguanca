<?php

namespace App\Http\Livewire\Usuarios;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Laravel\Jetstream\HasProfilePhoto;
use Livewire\Component;
use Livewire\WithFileUploads;

class Usuarios extends Component
{
    use WithFileUploads;
    use HasProfilePhoto;

    // Variables para controlar el modales
    public $modal = false, $edit = false, $delete = false;

    // Variables para los registros de usuarios
    public $usuarios, $user_id, $nombres, $apellidos, $email, $password, $role_id, $foto, $identificador;

    // Variables para los registros de roles
    public $roles, $nombre_rol;

    protected $rules = [
        'foto' => 'image|max:2048'
    ];

    public function mount() {
        $this->modal = false;
        $this->edit = false;
        $this->delete = false;
        $this->identificador = rand();
    }

    public function render()
    {
        $this->usuarios = User::all();
        $this->roles = Role::all();

        return view('livewire.usuarios.usuarios');
    }

    public function save() {
        $id = $this->user_id;
        
        $this->validate();
        User::updateOrCreate(['id' => $id], [
            'name' => $this->nombres,
            'apellidos' => $this->apellidos,
            'email' => $this->email,
            'password' => $this->password,
            'role_id' => $this->role_id,
            'file_name' => $this->foto == null ? null : $this->foto->getClientOriginalName(),
            'file_extension' => $this->foto == null ? null : $this->foto->extension(),
            'file_path' => $this->foto == null ? null : 'storage/' . $this->foto->store('profile', 'public'),
        ]);

        //$user->profile_photo_path = $ruta_foto;
        //$user->save();

        $this->limpiarCampos();
        $this->identificador = rand();
    }

    public function show($id) {
        $this->user_id = $id;
        $user = User::findOrFail($id);
        $this->cerrarModal();
        $this->abrirModalEditar();
        $this->nombres = $user->name;
        $this->apellidos = $user->apellidos;
        $this->email = $user->email;
        $this->password = $user->password;
        $this->role_id = $user->role_id;
        $this->foto = $user->file_path;
    }

    public function delete($id) {
        $this->user_id = $id;
        $this->abrirModalEliminar();
    }

    public function deleteUser() {
        $usuario = User::findOrFail($this->user_id);
        $usuario->delete();
    }

    public function deleteFoto() {
        $usuario = User::findOrFail($this->user_id);
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
