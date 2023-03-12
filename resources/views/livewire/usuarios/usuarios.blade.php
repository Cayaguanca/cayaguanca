<div>
    <div class="container p-5">
        <!-- contenedor de la tabla -->
        <div class="container p-5">
            <h1>Gestión de Administradores</h1>
            <div class="row align-items-start">
                <div class="row align-items-end mb-3">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button wire:click="abrirModal()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Registrar Administrador</button>
                    </div>
                </div>
                <!-- Tabla usuarios  -->
                <table class="display table-bordered table table-striped text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Foto</th>
                            <th>Correo Electrónico</th>
                            <th>Rol</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)    
                            <tr>
                                <td>{{ $usuario->id }}</td>
                                <td>{{ $usuario->name }}</td>
                                <td>{{ $usuario->apellidos }}</td>
                                <td>
                                    <img src={{ asset($usuario->file_path) }} alt="foto" width="120" height="120">
                                </td>
                                <td>{{ $usuario->email }}</td>
                                @if ($usuario->role_id == 1)
                                    <td>Super Administrador</td>
                                @endif
                                @if ($usuario->role_id == 2)
                                    <td>Administrador</td>
                                @endif
                                <td class="text-center">
                                    <button wire:click="show({{ $usuario->id }})" type="button" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(0, 138, 14, 1)" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </button>
                                    <button wire:click="delete({{ $usuario->id }})" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
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

    <!-- Modal Registrar -->
    <div wire:ignore.self data-bs-backdrop="static" class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    @if ($modal)
                        <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Registrar Administrador</h1>
                    @elseif ($edit)
                        <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Editar Administrador</h1>
                    @endif
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nombres" class="form-label fw-bold">Nombres</label>
                        <input wire:model="nombres" type="text" id="nombres" class="form-control" placeholder="Nombres del administrador">
                    </div>
                    <div class="form-group mb-3">
                        <label for="apellidos" class="form-label fw-bold">Apellidos</label>
                        <input wire:model="apellidos" type="text" id="apellidos" class="form-control" placeholder="Apellidos del administrador">
                    </div>
                    <div class="form-group mb-3">
                        <label for="email" class="form-label fw-bold">Correo Electrónico</label>
                        <input wire:model="email" type="email" id="email" class="form-control" placeholder="Correo electrónico">
                    </div>
                    @if (! $edit)    
                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-bold">Contraseña</label>
                            <input wire:model="password" type="password" id="password" class="form-control">
                        </div>
                    @else
                        <div class="form-group mb-3">
                            <label for="password" class="form-label fw-bold">Nueva Contraseña</label>
                            <input wire:model="password" type="password" id="password" class="form-control">
                        </div>
                    @endif
                    <div class="form-group mb-3">
                        <div class="row">
                            <label for="role_id" class="form-label fw-bold">Rol</label>
                        </div>
                        <select wire:model="role_id" name="roles" id="role_id" class="form-control">
                            <option value="">Seleccione ...</option>
                            @foreach ($roles as $rol)
                                <option value="{{ $rol->id }}">{{ $rol->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="foto" class="form-label fw-bold">Foto de perfil</label>
                        @if ($edit && ! $foto == null)
                            <div class="text-center">
                                <img src={{ asset($foto) }} alt="Foto" width="120" height="120">
                                <img src="{{$foto->temporaryUrl()}}" alt="" width="100" height="100">
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteFotoModal" class="btn">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(158, 0, 0, 1)" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                        <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                    </svg>
                                    Eliminar foto
                                </button>
                            </div>
                        @endif
                        <input wire:model="foto" type="file" accept="image/*" id="{{$identificador}}" class="form-control">
                    </div>
                    @if ($foto && $modal)
                        <div class="form-group mb-3 text-center">
                            <img src="{{$foto->temporaryUrl()}}" alt="" width="100" height="100">
                        </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button wire:click="limpiarCampos()" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    @if ($edit)
                        <button wire:click="save()" data-bs-toggle="modal" data-bs-target="#registerModal" type="button" class="btn btn-primary">Actualizar</button>
                    @else
                        <button wire:click="save()" data-bs-toggle="modal" data-bs-target="#registerModal" type="button" class="btn btn-primary">Registrar</button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar -->
    <div wire:ignore.self data-bs-backdrop="static" class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Eliminar Administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro/a que desea eliminar el administrador?</p>
                </div>
                <div class="modal-footer">
                    <button wire:click="cerrarModalEliminar()" type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteModal">Cancelar</button>
                    <button wire:click="deleteUser()" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button" class="btn btn-danger">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Eliminar Foto -->
    <div wire:ignore.self data-bs-backdrop="static" class="modal fade" id="deleteFotoModal" tabindex="-1" aria-labelledby="deleteFotoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Eliminar Foto de Perfil</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>¿Está seguro/a que desea eliminar la foto de perfil?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteFotoModal">Cancelar</button>
                    <button wire:click="deleteFoto()" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#deleteFotoModal" type="button" class="btn btn-danger">Confirmar</button>
                </div>
            </div>
        </div>
    </div>
</div>
