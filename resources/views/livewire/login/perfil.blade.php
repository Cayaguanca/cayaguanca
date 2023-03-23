<div>
        <div class="borde">
        <div id="main-wrapper">
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row page-titles">
                        <div class="col-md-5 align-self-center">
                            <h3>Mi Perfil</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-xlg-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="centrar">
                                        <img src={{asset($user->file_path)}} alt="foto" class="img-circular">
                                        
                                        <h4 class="card-title mt-2">{{ $user->name }}</h4>
                                        <h6 class="card-subtitle">{{ $user->role_id }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xlg-9">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-horizontal form-material mx-2">
                                        <div class="form-group">
                                            <label class="col-md-12">Nombres</label>
                                            <div class="col-md-12">
                                                <input wire:model="nombres" type="text" id="nombres" class="form-control" placeholder="Nombres">    
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Apellidos</label>
                                            <div class="col-md-12">
                                                <input wire:model="apellidos" type="text" placeholder="Apellidos..." class="form-control form-control-line">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="example-email" class="col-md-12">Email</label>
                                            <div class="col-md-12">
                                                <input wire:model="email" type="email" placeholder="email@email.com" disabled="true" class="form-control form-control-line" name="email" id="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-12">Foto de Perfil</label>
                                            <div class="col-md-12">
                                                <input type="file" >
                                            </div>
                                        </div>
                                            <div class="col-sm-12 borde" >
                                                <button type="submit" class="btn btn-success">Actualizar Perfil</button>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
