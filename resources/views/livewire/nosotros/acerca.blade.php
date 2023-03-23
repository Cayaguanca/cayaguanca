<div>
    <div class="container text-justify">
        <div class="row align-items-center">
            <div class="col-12 text-center"><h1>Acerca de Nosotros</h1></div>
            <div class="col">
                <label>
                    Una asociación es una organización sin fines de lucro que se crea para unir a personas con intereses comunes y alcanzar un objetivo compartido. Pueden tener diferentes objetivos, como la promoción de una causa social, el fomento de la educación, la defensa de los derechos de los consumidores o la representación de un grupo profesional.
                    Las asociaciones pueden estar formadas por individuos, empresas, organizaciones o instituciones. Pueden ser locales, regionales, nacionales o internacionales, y tener diferentes niveles de participación y estructuras de gobierno.
                </label>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
                <img src="{{ asset('img/cayaguanca.png') }}" alt="...">
            </div>
            <div class="col">
                <div class="col-12 text-center"><h3>Misión</h3></div>
                <label>
                    Una asociación es una organización sin fines de lucro que se crea para unir a personas con intereses comunes y alcanzar un objetivo compartido. Pueden tener diferentes objetivos, como la promoción de una causa social, el fomento de la educación, la defensa de los derechos de los consumidores o la representación de un grupo profesional.
                    Las asociaciones pueden estar formadas por individuos, empresas, organizaciones o instituciones. Pueden ser locales, regionales, nacionales o internacionales, y tener diferentes niveles de participación y estructuras de gobierno.
                </label>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col">
                <div class="col-12 text-center"><h3>Visión</h3></div>
                <label>
                    Una asociación es una organización sin fines de lucro que se crea para unir a personas con intereses comunes y alcanzar un objetivo compartido. Pueden tener diferentes objetivos, como la promoción de una causa social, el fomento de la educación, la defensa de los derechos de los consumidores o la representación de un grupo profesional.
                    Las asociaciones pueden estar formadas por individuos, empresas, organizaciones o instituciones. Pueden ser locales, regionales, nacionales o internacionales, y tener diferentes niveles de participación y estructuras de gobierno.
                </label>
            </div>
            <div class="col">
                <img src="{{ asset('img/cayaguanca.png') }}" alt="...">
            </div>
        </div>
        <div class="container-xxl py-5">
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h2 class="display-5 mb-5">Municipios asociados</h2>
                </div>
                <div class="row g-4">
                    @foreach ($municipios as $municipio)    
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item ">
                                <div class="service-img">
                                    <img class="img-fluid" src="{{ asset('img/cayaguanca.png') }}" alt="...">
                                </div>
                                <div class="service-text rounded p-5">
                                    <h4 class="mb-3">{{$municipio->nombre_municipio}}</h4>
                                    <p class="mb-4"></p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>