<?php

namespace App\Http\Livewire\Donantes;

use App\Models\Donante;
use Livewire\Component;
use Livewire\WithFileUploads;

class Donantes extends Component
{
    use WithFileUploads;

    // varibales para controlar modales
    public $modal = false, $edit = false, $delete = false;
    // variables para los registros de donantes
    public $donantes, $donante_id, $nombre, $logo, $identificador;

    public function mount() {
        $this->modal = false;
        $this->edit = false;
        $this->delete = false;
        $this->identificador = rand();
    }
    public function render()
    {
        $this->donantes = Donante::all();
        return view('livewire.donantes.donantes');
    }

    public function save() {
        $id = $this->donante_id;

        Donante::updateOrCreate(['id' => $id], [
            'nombre' => $this->nombre,
            'file_name' => $this->logo ? $this->logo->getClientOriginalName() : '',
            'file_extension' => $this->logo ? $this->logo->extension() : '',
            'file_path' => $this->logo ? 'storage/' . $this->logo->store('logo', 'public') : '',
        ]);

        $this->limpiarCampos();
        $this->identificador = rand();
    }

    public function show($id) {
        $this->donante_id = $id;
        $donante = Donante::findOrFail($id);
        $this->cerrarModal();
        $this->abrirModalEditar();
        $this->nombre = $donante->nombre;
    }

    public function delete($id) {
        $this->donante_id = $id;
        $this->abrirModalEliminar();
    }

    public function deleteDonante() {
        $donante = Donante::findOrFail($this->donante_id);
        $donante->delete();
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

        $this->nombre = '';
    }
}
