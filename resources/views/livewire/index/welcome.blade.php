<div>
    <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-6 text-white mb-5 animated slideInDown">Descubre los nuevos proyectos y eventos de la Asociación de Municipios Cayaguanca</h1>
                                    <a href="#proyecto_label" class="btn btn-primary py-sm-3 px-sm-4">Explorar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-6 text-white mb-5 animated slideInDown">Descubre los nuevos proyectos y eventos de la Asociación de Municipios Cayaguanca</h1>
                                    <a href="" class="btn btn-primary py-sm-3 px-sm-4">Explorar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Proyectos Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <h1 id="proyecto_label" class="display-5 mb-5">PROYECTOS</h1>
            </div>
            <div class="row g-4">
                @foreach ($proyectos as $proyecto)    
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded h-100">
                            @if (count($proyecto->media_proyecto) != 0)    
                                <div class="service-img rounded">
                                    <img class="img-fluid" src={{ asset($proyecto->media_proyecto[0]->file_path) }} alt="">
                                </div>
                            @endif
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-3.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">{{ $proyecto->nombre_proyecto }}</h4>
                                <p class="mb-4">{{ $proyecto->descripcion_proyecto }}</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Proyectos End -->

    <!-- Eventos Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                
                <h1 class="display-5 mb-5">EVENTOS</h1>
            </div>
            <div class="row g-4">
                @foreach ($eventos as $evento)    
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded d-flex h-100">
                            @if (count($proyecto->media_proyecto) != 0)    
                                <div class="service-img rounded">
                                    <img class="img-fluid" src={{ asset($evento->media_eventos[0]->file_path ) }} alt="">
                                </div>
                            @endif
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-3.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Landscaping</h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Eventos End -->
</div>
