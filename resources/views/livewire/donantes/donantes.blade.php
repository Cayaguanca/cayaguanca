<div>
    <div class="container p-5">
        <h1>Gestión de Donantes</h1>
        <div class="row align-items-end mb-3">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button wire:click="abrirModal()" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registerModal">Registrar Donante</button>
            </div>
        </div>
        <!-- Tabla donantes  -->
        <table class="table text-center" style="width:100%">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Logo</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($donantes as $donante)    
                    <tr>
                        <td>{{ $donante->id }}</td>
                        <td>{{ $donante->nombre }}</td>
                        <td>
                            <img src={{ asset($donante->file_path) }} alt="Logo" width="120" height="120">
                        </td>
                        <td class="text-center">
                            <button wire:click="show({{ $donante->id }})" type="button" data-bs-toggle="modal" data-bs-target="#registerModal" class="btn">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" color="rgba(0, 138, 14, 1)" class="bi bi-pencil-square" viewBox="0 0 16 16" >
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </button>
                            <button wire:click="delete({{ $donante->id }})" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal" class="btn">
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
        {{ $donantes->links('pagination') }}
    </div>

    <!-- Modal Registrar -->
    <div wire:ignore.self data-bs-backdrop="static" wire:keydown.escape="limpiarCampos()" class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-dark">
                    @if($modal)
                        <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Registrar Donante</h1>
                    @elseif ($edit)
                        <h1 class="modal-title fs-5" style="color: #fff" id="exampleModalLabel">Editar Donante</h1>
                    @endif
                    <button wire:click="limpiarCampos()" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mb-3">
                        <label for="nombre" class="form-label fw-bold">Nombre</label>
                        <input wire:model="nombre" type="text" id="nombre" class="form-control" placeholder="Nombre del donante">
                        @error('nombre') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="logo" class="form-label fw-bold">Logo del donante</label>
                        <input wire:model="logo" type="file" accept="image/*" id="{{$identificador}}" class="form-control">
                        @error('logo') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
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
                    <p>¿Está seguro/a que desea eliminar el donante?</p>
                </div>
                <div class="modal-footer">
                    <button wire:click="cerrarModalEliminar()" type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-target="#deleteModal">Cancelar</button>
                    <button wire:click="deleteDonante()" data-bs-toggle="modal" data-bs-target="#deleteModal" type="button" class="btn btn-danger">Confirmar</button>
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
                    title: 'Donante guardado con extio',
                    showConfirmButton: false,
                    timer: 1000,
                })
            });
        </script>
        <script>
            //Alerta confirmar eliminar evento
            window.addEventListener('swal:delete', event =>{
                Swal.fire({
                    title: 'Donante eliminado correctamente',
                    icon: 'warning',
                    showConfirmButton: false,
                    timer: 1000
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