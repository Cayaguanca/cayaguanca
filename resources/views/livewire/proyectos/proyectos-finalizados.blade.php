<div>
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-3 bg-ligth border border-3 border-top-0 border-bottom-0 border-start-0 border-secondary">
                <h1 class="mt-4">Historial de proyectos</h1>
                <div class="form-group mt-4">
                    <label for="buscar" class="form-label fw-bold">Buscar</label>
                    <input wire:model="busqueda_nombre" wire:keyup="getProyectosNombres"  type="text" class="form-control" placeholder="Nombre del proyecto" id="buscar">
                </div>
                <div class="form-group mt-4 mb-4">
                    <label for="municipios" class="form-label fw-bold">Municipios</label>
                    <select wire:model="busqueda_municipios" wire:change="getProyectosMunicipios" class="form-control" name="municipios" id="municipios">
                        <option value="">Seleccione...</option>
                        @foreach ($municipios as $municipio)
                            <option value="{{ $municipio->id }}">{{ $municipio->nombre_municipio}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-8 ms-5 mb-4">
                <h1 class="mt-4 mb-4">Proyectos Finalizados</h1>
                @foreach ($proyectos as $proyecto)
                    @if ($proyecto->fecha_final < date('Y-m-d'))
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 d-flex align-items-center">
                                    @if (count($proyecto->media_proyecto) != 0)
                                        <img class="card-img ms-3" src={{ asset($proyecto->media_proyecto[0]->file_path) }} alt="imagen">
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">{{ $proyecto->nombre_proyecto }}</h4>
                                        <h5>Descripción</h5>
                                        <p>
                                            {{ $proyecto->descripcion_proyecto }}
                                        </p>
                                        <h5>Municipios</h5>
                                        @foreach ($proyecto->municipios as $municipio)
                                            <p>
                                                {{ $municipio->nombre_municipio }}
                                            </p>
                                        @endforeach
                                        <h6>Fecha de finalización</h6>
                                        <p>{{ $proyecto->fecha_final }}</p>
                                        <a href="{{ route('VerProyecto',$proyecto->id) }}">
                                            <button type="button" class="btn btn-primary">Ver detalles</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
