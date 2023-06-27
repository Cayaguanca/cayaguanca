<x-guest-layout>
    <div class="container-fluid mt-5">
        <div class="row text-center">
            <div class="col"></div>

            <div class="col-5">
                <x-authentication-card>
                    <x-slot name="logo">
                        <x-authentication-card-logo />
                    </x-slot>

                    <x-validation-errors/>

                    <div class="card" style="border-radius: 3em";>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-4">
                                    <x-label for="email" value="Correo Electrónico" class="label-form fw-bold mb-3 h3" />
                                    <x-input class="form-control" id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                </div>

                                <div class="form-group mb-4">
                                    <x-label for="password" value="Contraseña" class="label-form fw-bold mb-3 h3" />
                                    <x-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                </div>

                                <div class="form-group">
                                    <x-button class="btn btn-primary">
                                        {{ __('Iniciar sesión') }}
                                    </x-button>
                                </div>
                            </form>
                        </div>
                    </div>
                </x-authentication-card>
            </div>

            <div class="col"></div>
        </div>
    </div>
</x-guest-layout>
