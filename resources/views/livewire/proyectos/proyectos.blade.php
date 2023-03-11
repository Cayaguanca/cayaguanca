<div>
    {{-- The Master doesn't talk, he acts. --}}
    <div class="container p-5">
        <h1>Programas</h1>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#registrarModal"> 
                Registrar nuevo programa </button>
        </div>
        <div class="row align-items-start my-3">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead >
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre del programa</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Fecha de inicio</th>
                            <th scope="col">Fecha final</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($proyectos as $proyecto)
                        <tr>
                            <th scope="row"></th>
                            <td>{{$proyecto->nombre_proyecto}}</td>
                            <td>{{$proyecto->descripcion_proyecto}}</td>
                            <td>{{$proyecto->fecha_inicio}}</td>
                            <td>{{$proyecto->fecha_final}}</td>
                            <td>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(0, 138, 14, 1)" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </button>

                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                </button>

                                <button type="button" data-bs-toggle="modal" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(3, 29, 165, 1)" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!--Modal de registro -->
    <div wire:ignore.self class="modal fade" id="registrarModal" tabindex="-1" aria-labelledby="editModalLavel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark" >
                    <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Registrar Programa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    
                    <div class="form-group mb-3">
                        
                        <label for="nombre_proyecto" class="form-label fw-bold">Nombres del proyecto</label>
                        <input wire:model="nombre_proyecto" type="text" class="form-control" id="nombre_municipio" >
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="descripcion_proyecto" class="form-label fw-bold">Descripción del Programa</label>
                        <textarea wire:model="descripcion_proyecto" type="number" class="form-control" rows="4"
                        id="descripcion_proyecto"></textarea>
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="fecha_inicio" class="form-label fw-bold">Fecha de inicio</label>
                        <input wire:model="fecha_inicio" type="date" class="form-control" id="fecha_inicio">
                    </div>

                    <div class="form-group mb-3">
                        <label for="fecha_final" class="form-label fw-bold">Fecha de finalizacion</label>
                        <input wire:model="fecha_final" type="date" class="form-control" id="fecha_final">
                    </div>
                    <!--Apartado para agregar detalle de programa-->
                    <div class="grupo-modal container">
                        <div class="row">
                            <label class="form-label fw-bold">Detalle del programa</label>
                            <div class="row">
                                <div class="col-sm mb-3" >
                                    <label for="direccion_proyecto" class="form-label fw-bold">Dirección</label>
                                    <input wire:model="direccion_proyecto" type="text" class="form-control" id="direccion_proyecto">
                                </div>
                            </div>
                            <div class="col-sm mb-3" >
                                <label for="fecha_actividad" class="form-label fw-bold">fecha de actividad</label>
                                <input wire:model="fecha_actividad" type="date" class="form-control" id="fecha_actividad">
                            </div>
                            <div class="col-sm mb-3" >
                                <label for="municipio" class="form-label fw-bold">Selecione el municipio</label>
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
                                    <button wire:click="save_detalle_proyecto()" type="button" class="btn btn-primary me-2"> 
                                        Agregar detalle
                                    </button>
                                </div>  
                            </div>
                            <!--A revisar por que da errir de lectura de direccion_proyecto -->>
                            <div  wire:ignore.self class="row mb-3">
                                
                            </div>
                        </div>
                    </div>
                    <!--Apartado para agregar donantes-->
                    <div class="grupo-modal container my-3">
                        <div class="row">
                            <label class="form-label fw-bold">Donantes</label>
                            <div class="col-sm mb-3" >
                                <label for="donantes" class="form-label fw-bold">Seleccione un donante</label>
                                <select wire:model="donante_id" id="donantesid" class="form-control">
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
                            
                        </div>
                        <div class="col-8">
                            <button wire:click="save_donante()"  type="button" class="btn btn-primary me-2"> Agregar donante</button>
                        </div>  
                    </div>
                    <div class="form-group mb-3">
                        <label for="imagenes" class="form-label fw-bold">Imagenes</label>
                        <input wire:model="files" type="file" accept="image/png,image/jpg,image/jpeg,image/svg" id="imagenes" 
                        class="form-control" multiple>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Cerrar</button>
                    <button wire:click.prevent="save()" type="button" class="btn btn-primary" data-bs-dismiss="modal" >Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>
