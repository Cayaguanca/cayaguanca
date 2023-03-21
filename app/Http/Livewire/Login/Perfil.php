<?php

namespace App\Http\Livewire\Login;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Perfil extends Component
{

    public $user;
    public function render()
    {
        $users = auth()->user()->email;

        $this->user = DB::table('users')->where('email',$users)->get();

        
        return view('livewire.login.perfil');
    }
    public function perfil(){

        $users = auth()->user()->email;

        $user = DB::table('users')->where('email',$users)->get();

        $user[0]->foto = asset('/images/profiles/'.$user[0]->foto);
        
        /*return response()->json([
            'status' => true,
            'message' => 'Acerca del perfil',
            'user' => [
                'id' => $user[0]->id,
                'nombres' => $user[0]->nombres,
                'apellidos' => $user[0]->apellidos,
                'email' => $user[0]->email,
                'foto' => $user[0]->foto,
                'role_id' => $user[0]->role_id
            ]
        ], 200);*/
    }
}
