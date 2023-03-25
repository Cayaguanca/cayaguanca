<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Eventos\VerEvento;
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

Route::get('/', function () {
    return view('welcome');
});

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
    Route::view('/perfil','usuarios.perfil')->name('Perfil');
    Route::view('/acercadenosotros','nosotros.acerca')->name('AcercaDeNosotros');
});

Route::group(['middleware' => 'guest'], function () {
    Route::view('/galerias', 'galerias.galerias')->name('ListaGaleria');
    Route::view('/proyectos_finalizados', 'proyectos.proyectos-finalizados')->name('ListaProyTerminados');
});
