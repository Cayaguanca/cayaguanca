<?php

namespace App\Http\Livewire\Login;

use App\Models\User;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Perfil extends Component
{

    public $user, $nombres, $apellidos, $email;
    public function render()
    {
        $users = auth()->user()->id;
        
        $this->user = User::findOrFail($users);
        //dd($this->user);
        $this->nombres = $this->user->name;
        $this->apellidos = $this->user->apellidos;
        $this->email = $this->user->email;
        return view('livewire.login.perfil');
    }
    public function perfil(){

        $users = auth()->user()->email;

        $user = DB::table('users')->where('email',$users)->get();

        //$user[0]->foto = asset('/images/profiles/'.$user[0]->foto);
        
    }
}
