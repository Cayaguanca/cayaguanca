<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cayaguanca</title>

        <!-- Favicon -->
        <link href="{{ asset('img/favicon.ico') }}" rel="icon">

        <!-- Google Web Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">  

        <!-- Icon Font Stylesheet -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

        <!-- Libraries Stylesheet -->
        <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

        <!-- Customized Bootstrap Stylesheet -->
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <body class="antialiased">
        <!-- Topbar Start -->
        <div class="container-fluid bg-dark text-light px-0 py-2">
            <div class="row gx-0 d-none d-lg-flex">
                <div class="col-lg-7 px-5 text-start">
                    <div class="h-100 d-inline-flex align-items-center me-4">
                        <span class="fa fa-phone-alt me-2"></span>
                        <span>+012 345 6789</span>
                    </div>
                    <div class="h-100 d-inline-flex align-items-center">
                        <span class="far fa-envelope me-2"></span>
                        <span>info@example.com</span>
                    </div>
                </div>
                <div class="col-lg-5 px-5 text-end">
                    <div class="h-100 d-inline-flex align-items-center mx-n2">
                        <span>Follow Us:</span>
                        <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-link text-light">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-link text-light fw-bold">Iniciar Sesión</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
            <a href="/" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
                <img src="{{ asset('img/cayaguanca.png') }}" alt="..." height="90">
                <h1 class="m-0">Cayaguanca</h1>
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="" class="nav-item nav-link active">Inicio</a>
                    <a href="" class="nav-item nav-link">Contáctanos</a>
                    <a href="" class="nav-item nav-link">Sobre Nosotros</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Administración</a>
                        <div class="dropdown-menu bg-light m-0">
                            <a href="" class="dropdown-item">Usuarios</a>
                            <a href="" class="dropdown-item">Proyectos</a>
                            <a href="" class="dropdown-item">Eventos</a>
                            <a href="" class="dropdown-item">Donantes</a>
                            <a href="" class="dropdown-item">Municipios</a>
                            <a href="" class="dropdown-item">Suscriptores</a>
                            <a href="" class="dropdown-item">Galería</a>
                        </div>
                    </div>
                </div>
                <a href="" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Proyectos<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->

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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-1.jpg') }}" alt="">
                            </div>
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-2.jpg') }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-6.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Pruning plants</h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-3.jpg') }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-5.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Irrigation & Drainage</h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-4.jpg') }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-4.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Garden Maintenance </h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-5.jpg') }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-8.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Green Technology</h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-6.jpg') }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-2.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Urban Gardening</h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-1.jpg') }}" alt="">
                            </div>
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
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-2.jpg') }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-6.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Pruning plants</h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="{{ asset('img/service-3.jpg') }}" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <div class="btn-square rounded-circle mx-auto mb-3">
                                    <img class="img-fluid" src="{{ asset('img/icon/icon-5.png') }}" alt="Icon">
                                </div>
                                <h4 class="mb-3">Irrigation & Drainage</h4>
                                <p class="mb-4">Erat ipsum justo amet duo et elitr dolor, est duo duo eos lorem sed diam stet diam sed stet.</p>
                                <a class="btn btn-sm" href=""><i class="fa fa-plus text-primary me-2"></i>Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Eventos End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Our Office</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+012 345 67890</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@example.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-square btn-outline-light rounded-circle me-2" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Services</h4>
                        <a class="btn btn-link" href="">Landscaping</a>
                        <a class="btn btn-link" href="">Pruning plants</a>
                        <a class="btn btn-link" href="">Urban Gardening</a>
                        <a class="btn btn-link" href="">Garden Maintenance</a>
                        <a class="btn btn-link" href="">Green Technology</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Quick Links</h4>
                        <a class="btn btn-link" href="">About Us</a>
                        <a class="btn btn-link" href="">Contact Us</a>
                        <a class="btn btn-link" href="">Our Services</a>
                        <a class="btn btn-link" href="">Terms & Condition</a>
                        <a class="btn btn-link" href="">Support</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="text-white mb-4">Newsletter</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative w-100">
                            <input class="form-control bg-light border-light w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Copyright Start -->
        <div class="container-fluid copyright py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a> Distributed By <a href="https://themewagon.com">ThemeWagon</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i class="bi bi-arrow-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('lib/counterup/counterup.min.js') }}"></script>
        <script src="{{ asset('lib/parallax/parallax.min.js') }}"></script>
        <script src="{{ asset('lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>
