<?php

namespace App\Http\Livewire\Nosotros;

use App\Mail\contactanos as MailContactanos;
use App\Mail\ContactanosEmail;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;

class Contactanos extends Component
{
    public $nombre;
    public $email;
    public $mensaje;

    protected $rules = [
        'nombre' => 'required',
        'email' => 'required|email',
        'mensaje' => 'required',
    ];

    protected $messages = [
        'nombre.required' => 'El campo nombre del remitente es obligatorio.',
        'email.required' => 'El campo email del remitente es obligatorio.',
        'mensaje.required' => 'Debe enviarnos un comentario o sugerencia es obligatorio.',
        'email.email' => 'Debe escribir un correo electronico'
    ];

    public function enviar()
    {
        $this->validate();

        $contact['nombre'] = $this->nombre;
        $contact['email'] = $this->email;
        $contact['mensaje'] = $this->mensaje;
        Mail::to('miguelamaya11972@gmail.com')->send(new ContactanosEmail($this->nombre, $this->email, $this->mensaje));
        $this->resetForm();
        $this->dispatchBrowserEvent('swal:confirmacion',[
            'title' => 'Sugerencia enviada con exito.'
        ]);

    }

    private function resetForm()
    {
        $this->nombre = '';
        $this->email = '';
        $this->mensaje = '';
    }

    public function render()
    {
        return view('livewire.nosotros.contactanos');
    }
    
}
