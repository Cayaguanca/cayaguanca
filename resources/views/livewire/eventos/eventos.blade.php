<div>

    <div class="container p-5">

        <h1>Eventos</h1>
        
        <div class="d-flex bd-highlight">
            <div class="me-auto p-2 bd-highlight">
                <input class="form-control float-left mx-auto " placeholder="Buscar Evento" aria-label="Sizing example input" type="text" >
            </div>
            <div class="p-2 bd-highlight">
                <button wire:click="limpiar_campos()" type="button" data-bs-toggle="modal" data-bs-target="#registrarModal" class="btn btn-primary me-2"> Registrar nuevo evento </button>
            </div>
        </div>
        
        <div class="row align-items-start">
            <!-- Tabla eventos  -->
            <div class="row align-items-start my-3">
                <table class="table" id="table">
                    <thead >
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Nombre del Evento</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($eventos as $evento)
                            <tr>
                                <th scope="row">{{$evento->id}}</th>
                                <td>{{$evento->nombre_evento}}</td>
                                <td>{{$evento->descripcion_evento}}</td>
                                <td>
                                    <button wire:click="edit_evento({{$evento->id}})" type="button" data-bs-toggle="modal" data-bs-target="#registrarModal" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(0, 138, 14, 1)" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>

                                    <button wire:click="delete({{$evento->id}})" type="button" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>

                                    <a href="{{ route('VerEventos',$evento->id) }}" type="button" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(3, 29, 165, 1)" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if (count($eventos))
                    {{$eventos->links('pagination')}}
                @endif
                
            </div>
        </div>
        

        <!--Modal registrar -->
        <div wire:ignore.self class="modal fade" id="registrarModal" tabindex="-1" aria-labelledby="registrarModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header bg-dark">
                        <h1 class="modal-title fs-5" style="color: #fff">Evento</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="save()" autocomplete="off">
                    <div class="modal-body">
                        <div class="form-group mb-3">
                            <label for="nombre_evento" class="form-label fw-bold">Nombre del Evento</label>
                            <input wire:model="nombre_evento" type="text" id="nombre_evento" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="descripcion" class="form-label fw-bold">descripcion</label>
                            <textarea wire:model="descripcion_evento" id="descripcion_evento" rows="4" class="form-control form-control-line"></textarea>
                        </div>
                        <div class="grupo-modal container mb-3">
                            <label class="form-label fw-bold">Detalle del Evento</label>
                            <div class="row">
                                <div class="col-6">
                                    <label for="fecha_evento" class="form-label fw-bold">Fecha del Evento</label>
                                    <input wire:model="fecha_evento" type="date" id="fecha_evento" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm mb-3" >
                                    <label for="direccion_evento" class="form-label fw-bold">Direccion del Evento</label>
                                    <input wire:model="direccion_evento" type="text" id="direccion_evento" class="form-control" placeholder="Dirección del evento">
                                </div>
                                <div class="col-sm mb-3">
                                    <label for="municipio_id" class="form-label fw-bold">Municipio</label>
                                    <select wire:model="municipio_id" id="municipio_id" class="form-control">
                                        <option value="">
                                            --seleccione un municipio--
                                        </option>
                                        @foreach($municipios as $municipio)
                                        <option value= {{$municipio->id}}>                                        
                                            {{$municipio->nombre_municipio}}
                                        </option>
                                        @endforeach
                                    </select>  
                                </div>
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <button wire:click="save_detalle_evento()" type="button" class="btn btn-primary me-2"> Agregar Localización  </button>
                                    </div>  
                                </div>
                            </div> 
                            <div class="row mb-3" >
                                @foreach($detallesAdd as $detalle)
                                <label >Direccion: {{$detalle['direccion_evento']}} Fecha: {{$detalle['fecha']}} Municipio: {{$detalle['municipio']}} 
                                <button wire:click="delete_detalle({{$detalle['id']}})" type="button" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>
                                </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="grupo-modal container">
                            <div class="row">
                                <div class="col-sm mb-3" >
                                    <label  class="form-label fw-bold">Nombre del donante</label>
                                    <select wire:model="donante_id" id="donantes_id" class="form-control">
                                        <option value="">
                                            --seleccione un donante--
                                        </option>
                                        @foreach ($donantes as $donante)
                                        <option value={{$donante->id}}>
                                            {{$donante->nombre}}
                                        </option>
                                        @endforeach
                                    </select>    
                                </div>
                                <div class="row mb-3" >
                                    
                                    @foreach($donanteAdd as $donante)
                                    <label >{{$donante['id']}} Nombre: {{$donante['nombre']}} 
                                    <button wire:click="delete_donante_evento({{$donante['id']}},{{$donante['donante_evento_id']}})" type="button" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                        </svg>
                                    </button>
                                    </label>
                                    @endforeach
                                    
                                </div>
                                <div class="row mb-3">
                                    <div class="col-8">
                                        <button wire:click="save_donante()" onclick="mostrarDonantes()" type="button" class="btn btn-primary me-2"> Agregar Donante  </button>
                                    </div>  
                                </div>
                            </div>  
                        </div>
                        <div class="form-group mb-3">
                            <label for="imagenes" class="form-label fw-bold">Imagenes</label>
                            <input wire:model.defer="files" type="file" accept="image/png,image/jpg,image/jpeg,image/svg" id="imagenes" 
                            class="form-control" multiple>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button  data-bs-toggle="modal" data-bs-target="#registrarModal" type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
     <!--SweetAlert-->
    @push('modals')
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            //Alert cofnirmacion guardar con exito
            window.addEventListener('swal:modal', event =>{
                Swal.fire({
                    icon: 'success',
                    title: 'Evento guardado con extio',
                    showConfirmButton: false,
                    timer: 1000,
                })
            });
        </script>
        <script>
            //Alerta confirmar eliminar evento
            window.addEventListener('swal:confirmarDelete', event =>{
                Swal.fire({
                    title: '¿Esta seguro que desea eliminar el evento?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, Quiero eliminarlo'
                    }).then((result) => {
                    if (result.isConfirmed) {//si confirma borrar evento
                        Livewire.emit('eliminar')
                    }
                })
            });
        </script>
    @endpush
</div>
<style>
    .table{
        background-color: #FFFFFF;
        border-radius: 10% 10% 0% 0%;
        border-collapse: collapse;
    }
</style>
