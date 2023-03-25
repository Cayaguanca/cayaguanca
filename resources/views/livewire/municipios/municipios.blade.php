<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    <div class="container p-5">
        <h1>Municipios</h1>
        
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button wire:click="limpiarCampo()" type="button" data-bs-toggle="modal" data-bs-target="#editModal"
            class="btn btn-primary me-2"> Registrar nuevo municipio </button>
        </div>
        <div class="row align-items-start my-3 table-responsive">

            <table class="table text-center" id="municipios" style="width:100%">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Nombre del municipio</th>
                        <th>Codigo postal</th>
                        <th>Escudo</th>
                        <th>Fecha de afiliación</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($municipios as $municipio)
                    <tr>        
                        <td>{{$municipio->id}}</td>
                        <td>{{$municipio->nombre_municipio}}</td>
                        <td>{{$municipio->codigo_postal}}</td>
                        <td>
                            <img src={{asset($municipio->file_path)}} alt="foto" width="120" height="120" class="img-fluid">
                        </td>
                        <td>{{$municipio->fecha_afiliacion}}</td>
                        <td>{{$municipio->descripcion_municipio}}</td>
                        <td>
                            
                            <button wire:click="editar({{$municipio->id}})" type="button" data-bs-toggle="modal" data-bs-target="#editModal" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(0, 138, 14, 1)" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>

                            <button wire:click="delete({{$municipio->id}})" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn">
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

    <!-- Modal Editar -->
    <div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLavel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" wire:submit.prevent="save">
                <div class="modal-header bg-dark" >
                    <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Editar Municipio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form wire:submit.prevent="save()">
                    <div class="form-group mb-3">
                        
                        <label for="nombre_municipio" class="form-label fw-bold">Nombres de municipio</label>
                        <input wire:model="nombre_municipio"  type="text" class="form-control" 
                        id="nombre_municipio" >
                        @error('nombre_municipio')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        
                        <label for="codigo_postal" class="form-label fw-bold">Codigo postal</label>
                        <input wire:model="codigo_postal" type="number" class="form-control" id="codigo_postal">
                        @error('codigo_postal')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">

                        <label for="escudo" class="form-label fw-bold">Escudo</label>
                        <input wire:model="escudo" type="file" accept="image/png,image/jpg,image/jpeg,image/svg" id="foto" class="form-control">
                        @error('escudo')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="fecha_afiliacion" class="form-label fw-bold">Fecha de afiliación</label>
                        <input wire:model="fecha_afiliacion" type="date" class="form-control" id="fecha_afiliacion">
                        @error('fecha_afiliacion')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="descripcion_municipio" class="form-label fw-bold">Decripción del municipio</label>
                        <input wire:model="descripcion_municipio" type="text" class="form-control" id="descripcion_municipio">
                        @error('descripcion_municipio')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button wire:click.prevent="save()" type="button" class="btn btn-primary" data-bs-dismiss="modal" >Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    {{-- modal eliminar --}}
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLavel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5" style="color: #fff" id="eliminarModalLabel">Eliminar Municipio</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro que desea eliminar el municipio?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" wire:click.prevent="delete_now()" class="btn btn-danger close-modal"
                        data-bs-dismiss="modal">Sí, eliminar</button>
                </div>
            </div>
        </div>
    </div>

</div>
