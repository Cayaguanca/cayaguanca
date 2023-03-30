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
                                <div class="dropdown">
                                    <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg width="25" height="25" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 11C13.2386 11 11 13.2386 11 16C11 18.7614 13.2386 21 16 21C18.7614 21 21 18.7614 21 16C21 13.2386 18.7614 11 16 11ZM9 16C9 12.134 12.134 9 16 9C19.866 9 23 12.134 23 16C23 19.866 19.866 23 16 23C12.134 23 9 19.866 9 16Z" fill="black"/>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.7178 2.66091C11.9925 2.57225 12.292 2.60657 12.5395 2.75506L15.4626 4.50892C15.8209 4.49291 16.1797 4.49292 16.538 4.50895L19.449 2.76696C19.6944 2.62009 19.991 2.58534 20.2638 2.67151C22.174 3.27503 23.9304 4.28652 25.4111 5.63593C25.6233 5.82937 25.7422 6.10474 25.7374 6.39188L25.6802 9.78968C25.8776 10.0928 26.0587 10.4062 26.2228 10.7286L29.1859 12.3761C29.4354 12.5148 29.6138 12.7535 29.676 13.0321C30.1119 14.9847 30.1165 17.009 29.6894 18.9635C29.628 19.2445 29.4486 19.4855 29.197 19.6248L26.2224 21.2723C26.0584 21.5944 25.8774 21.9076 25.6802 22.2104L25.7374 25.6082C25.7422 25.8954 25.6233 26.1708 25.411 26.3642C23.9334 27.7107 22.1846 28.7251 20.2822 29.3392C20.0075 29.4279 19.708 29.3935 19.4605 29.245L16.5374 27.4912C16.1791 27.5072 15.8203 27.5072 15.462 27.4912L12.551 29.2331C12.3056 29.38 12.009 29.4148 11.7362 29.3286C9.82595 28.7251 8.06965 27.7136 6.58892 26.3642C6.37665 26.1707 6.25779 25.8953 6.26264 25.6082L6.31991 22.2181C6.12368 21.9118 5.94274 21.596 5.77777 21.2718L2.81407 19.6241C2.56456 19.4853 2.38624 19.2466 2.32403 18.968C1.88807 17.0154 1.88347 14.9911 2.31055 13.0366C2.37195 12.7556 2.55138 12.5146 2.803 12.3753L5.77764 10.7278C5.94163 10.4057 6.12262 10.0925 6.31984 9.78968L6.26264 6.39188C6.25781 6.10473 6.37667 5.82935 6.58895 5.63591C8.06656 4.28944 9.81539 3.27502 11.7178 2.66091ZM8.27015 6.82089L8.32486 10.0707C8.3284 10.2813 8.2654 10.4875 8.14482 10.6602C7.87659 11.0442 7.64177 11.4505 7.44292 11.8746C7.35352 12.0652 7.20621 12.2228 7.022 12.3248L4.17767 13.9002C3.92888 15.2892 3.93234 16.7117 4.18788 18.0995L7.02343 19.6761C7.20625 19.7777 7.35259 19.9341 7.44186 20.1233C7.64508 20.5539 7.8821 20.9678 8.15071 21.361C8.26751 21.5319 8.32835 21.7349 8.32486 21.9419L8.27018 25.1791C9.35105 26.0922 10.5871 26.8039 11.9194 27.2803L14.699 25.617C14.875 25.5116 15.0792 25.463 15.2838 25.4776C15.7607 25.5117 16.2393 25.5117 16.7162 25.4776C16.9212 25.4629 17.1257 25.5118 17.302 25.6176L20.0905 27.2907C21.4185 26.8067 22.6506 26.0919 23.7299 25.1792L23.6751 21.9294C23.6716 21.7188 23.7346 21.5126 23.8552 21.3399C24.1234 20.9559 24.3582 20.5496 24.5571 20.1255C24.6465 19.9349 24.7938 19.7773 24.978 19.6753L27.8223 18.0999C28.0711 16.7109 28.0677 15.2884 27.8121 13.9006L24.9766 12.324C24.793 12.222 24.6462 12.0647 24.5571 11.8746C24.3582 11.4505 24.1234 11.0442 23.8552 10.6602C23.7346 10.4875 23.6716 10.2813 23.6751 10.0707L23.7298 6.82102C22.649 5.90792 21.4129 5.1962 20.0806 4.71976L17.301 6.38314C17.125 6.48849 16.9208 6.53714 16.7162 6.5225C16.2393 6.4884 15.7607 6.4884 15.2838 6.5225C15.0788 6.53717 14.8743 6.4883 14.698 6.38254L11.9094 4.70941C10.5815 5.1934 9.34942 5.90823 8.27015 6.82089Z" fill="black"/>
                                        </svg>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a wire:click="delete({{$user_id}})" class="dropdown-item">Eliminar Foto de Perfil</a></li>
                                    </ul>
                                </div>
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
</div>
