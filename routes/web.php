<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Eventos\VerEvento;
<<<<<<< HEAD
use App\Mail\ContactanosEmail;
use Illuminate\Support\Facades\Mail;
=======
use App\Http\Livewire\Proyectos\VerProyecto;
use App\Http\Livewire\Proyectos\VerProyectos;
>>>>>>> 6a44401b75d5daafd6ef351b28859aa0634c2f9b

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    
    Route::view('/donantes', 'donantes.donantes')->name('ListaDonantes');
    Route::view('/proyectos', 'proyectos.proyectos')->name('ListaProyectos');
    Route::view('/municipios', 'municipios.municipios')->name('ListaMunicipios');
    Route::view('/galeria', 'galerias.galerias')->name('ListaGaleria');
    Route::view('/usuarios', 'usuarios.usuarios')->name('ListaUsuarios');
    Route::view('/suscriptores','suscriptores.suscriptores')->name('ListaSuscriptores');
    Route::view('/eventos','eventos.eventos')->name('ListaEventos');
    Route::get('/eventos/ver/{id}', VerEvento::class)->name('VerEventos');
    Route::get('proyectos/ver/{id}', VerProyecto::class)->name('VerProyecto');
    Route::view('/perfil','usuarios.perfil')->name('Perfil');
    Route::view('/acercadenosotros','nosotros.acerca')->name('AcercaDeNosotros');
<<<<<<< HEAD
    Route::view('/contactanos','nosotros.contactanos')->name('Contactanos');
    
=======
    Route::view('/proyectos_finalizados', 'proyectos.proyectos-finalizados')->name('ListaProyTerminados');
>>>>>>> 6a44401b75d5daafd6ef351b28859aa0634c2f9b
});

Route::group(['middleware' => 'guest'], function () {
    Route::view('/', 'index.welcome')->name('index');
});
