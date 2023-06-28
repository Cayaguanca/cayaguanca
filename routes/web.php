<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Eventos\VerEvento;
use App\Http\Livewire\Proyectos\VerProyecto;
use App\Http\Livewire\Proyectos\VerProyectos;

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

Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::view('/donantes', 'donantes.donantes')->name('ListaDonantes');
    Route::view('/proyectos', 'proyectos.proyectos')->name('ListaProyectos');
    Route::view('/municipios', 'municipios.municipios')->name('ListaMunicipios');
    Route::view('/galeria', 'galerias.galerias')->name('ListaGaleria');
    Route::view('/suscriptores','suscriptores.suscriptores')->name('ListaSuscriptores');
    Route::view('/eventos','eventos.eventos')->name('ListaEventos');
    Route::view('/perfil','usuarios.perfil')->name('Perfil');
    /*Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');*/
    //Route::view('/', 'index.welcome')->name('index');
});

Route::middleware(['auth:sanctum', 'isSuperAdmin'])->group(function () {
    Route::view('/usuarios', 'usuarios.usuarios')->name('ListaUsuarios');

    Route::view('/donantes', 'donantes.donantes')->name('ListaDonantes');
    Route::view('/proyectos', 'proyectos.proyectos')->name('ListaProyectos');
    Route::view('/municipios', 'municipios.municipios')->name('ListaMunicipios');
    Route::view('/galeria', 'galerias.galerias')->name('ListaGaleria');
    Route::view('/suscriptores','suscriptores.suscriptores')->name('ListaSuscriptores');
    Route::view('/eventos','eventos.eventos')->name('ListaEventos');
    Route::view('/perfil','usuarios.perfil')->name('Perfil');
});

Route::view('/', 'index.welcome')->name('index');
Route::get('/eventos/ver/{id}', VerEvento::class)->name('VerEventos');
Route::get('proyectos/ver/{id}', VerProyecto::class)->name('VerProyecto');
Route::view('/acercadenosotros','nosotros.acerca')->name('AcercaDeNosotros');
Route::view('/contactanos','nosotros.contactanos')->name('Contactanos');
Route::view('/proyectos_finalizados', 'proyectos.proyectos-finalizados')->name('ListaProyTerminados');
