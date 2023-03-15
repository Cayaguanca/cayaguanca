<div>

    <div class="container p-5">

    <h1>Eventos</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
        <button type="button" data-bs-toggle="modal" data-bs-target="#registrarModal" class="btn btn-primary me-2"> Registrar nuevo evento </button>
    </div>
    <div class="row align-items-start">
        <!-- Tabla eventos  -->
       <livewire:eventos.tabla theme="bootstrap-5" />
    </div>

    <!--Modal registrar -->
    <div wire:ignore.self class="modal fade" id="registrarModal" tabindex="-1" aria-labelledby="registrarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5" style="color: #fff">Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form wire:submit.prevent="save()">
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nombre_evento" class="form-label fw-bold">Nombre del Evento</label>
                        <input wire:model="nombre_evento" type="text" id="nombre_evento" class="form-control" placeholder="Nombre del evento">
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
                                    <button wire:keydown.enter="save_detalle_evento()" type="button" class="btn btn-primary me-2"> Agregar Localización  </button>
                                </div>  
                            </div>
                        </div> 
                        <div id="lista_detalles" class="form-group mb-3">
                            <h5>Detalles</h5> 
                            <ul >
                                <div >
                                    <div>
                                        Fecha evento: , direccion: , Municipio: 
                                        <button type="button" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="eliminarDetalle" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </ul>
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
                            <div class="row mb-3">
                                <div class="col-8">
                                    <button wire:click="save_donante()" onclick="mostrarDonantes()" type="button" class="btn btn-primary me-2"> Agregar Donante  </button>
                                </div>  
                            </div>
                        </div>
                        <div id="lista_donantes" class="form-group mb-3">
                            <h5>Donantes</h5>
                            <div>
                                <div>
                                    <div>
                                        @foreach($detallesAdd as $donante)
                                            {{$donante->id}}
                                        @endforeach
                                        <button type="button" class="btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                                <path fill-rule="eliminarDonante" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                            </svg>
                                        </button>
                                    </div>
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

    <!--Eliminar Modal-->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro/a que desea eliminar el evento?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button data-bs-toggle="modal" data-bs-target="#deleteModal" type="button" class="btn btn-danger">Confirmar</button>
                </div>
            </div>
        </div>
</div>

