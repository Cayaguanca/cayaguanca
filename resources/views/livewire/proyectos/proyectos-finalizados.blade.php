<div>
    <div class="container-fluid bg-light">
        <div class="row">
            <div class="col-3 bg-ligth border border-3 border-top-0 border-bottom-0 border-start-0 border-secondary">
                <h1 class="mt-4">Historial de proyectos</h1>
                <div class="form-group mt-4">
                    <label for="buscar" class="form-label fw-bold">Buscar</label>
                    <input type="text" class="form-control" placeholder="Nombre del proyecto" id="buscar">
                </div>
                <div class="form-group mt-4 mb-4">
                    <label for="municipios" class="form-label fw-bold">Municipios</label>
                    <select class="form-control" name="municipios" id="municipios">
                        <option value="">Seleccione...</option>
                    </select>
                </div>
            </div>
            <div class="col-8 ms-5 mb-4">
                <h1 class="mt-4 mb-4">Proyectos Finalizados</h1>
                @foreach ($proyectos as $proyecto)    
                    <div class="card mb-3">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img src="..." alt="imagen" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h4 class="card-title">{{ $proyecto->nombre_proyecto }}</h4>
                                    <h5>Descripción</h5>
                                    <p>
                                        {{ $proyecto->descripcion_proyecto }}
                                    </p>
                                    <h6>Fecha de finalización</h6>
                                    <p>{{ $proyecto->fecha_final }}</p>
                                    <button type="button" class="btn btn-primary">Ver detalles</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
