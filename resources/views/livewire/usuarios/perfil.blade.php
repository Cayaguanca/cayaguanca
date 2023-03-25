<div>
    <div class="borde mb-5">
        <div id="main-wrapper">
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h3>Mi Perfil</h3>
                        </div>
                    </div>
                    @if (session('mensaje'))
                        <div class="alert alert-danger">
                            <p>{{ session('mensaje') }}</p> 
                        </div>
                    @endif
                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        {{$error}}<br>
                        @endforeach
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-lg-4 col-xlg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="centrar">
                                        <img alt="foto" class="img-circular" width="200" height="200" src={{asset($usuario->file_path)}}>
                                        
                                        <h4 class="card-title mt-2">{{ $usuario->name }} {{$usuario->apellidos}}</h4>
                                        <h6 class="card-subtitle">{{ $role->nombre }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xlg-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-md-12">Nombres</label>
                                        <div class="col-md-12">
                                        <input autocomplete="off" wire:model="nombres" type="text" id="nombres" class="form-control" placeholder="Nombres del administrador">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="col-md-12">Apellidos</label>
                                        <div class="col-md-12">
                                            <input autocomplete="off" wire:model="apellidos" type="text" id="apellidos" class="form-control form-control-line">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="example-email" class="col-md-12">Email</label>
                                        <div class="col-md-12">
                                            <input wire:model="email" type="email" placeholder="email@email.com" disabled="true" class="form-control form-control-line" name="email" id="email">
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label class="col-md-12">Foto de Perfil</label>
                                        <div class="col-md-12">
                                            <input wire:model="foto" type="file" accept="image/png,image/jpg,image/jpeg,image/svg" id="foto" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 borde mt-3">
                                        <button wire:click="save()" type="button" class="btn btn-primary">Actualizar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('modals')
        <script src="sweetalert2.all.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('swal:modal', event =>{
                Swal.fire({
                    icon: 'success',
                    title: 'Usuario actualizado',
                    showConfirmButton: true,
                })
            });
        </script>
    @endpush
</div>
