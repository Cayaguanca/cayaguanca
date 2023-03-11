<div>
    {{-- Stop trying to control. --}}
    <div class="row">
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <h2 class="my-3 text-center">Galería de Eventos y Programas</h2>
            <form>
                <div class="mb-3">
                    <label for="buscar" class="form-label">Buscar</label>
                    <input wire:model="search" wire:keyup="find" type="text" class="form-control">
                    <div id="text" class="form-text">Nombre de evento o proyecto.</div>
                </div>
            </form>
        </div>
        <!-- comienza el ciclo for  para proyectos y eventos index-->
        <div class="col-sm-12 col-md-10 col-lg-10 col-xl-10">
            <!--Comienza for para proyectos -->
            @foreach ($galeria_proyecto as $proyecto)
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h2 class="display-5 mb-5">{{$proyecto->nombre_proyecto}}</h2>
                    <p>{{$proyecto->descripcion_proyecto}}</p>
                    <button wire:click="save_id({{$proyecto->id}})" type="button" data-bs-toggle="modal" data-bs-target="#uploadImgModal" class="btn btn-secondary">
                    Cargar imagenes a galeria</button>
                </div>
                <div class="row g-4 portfolio-container my-2">
                    @foreach($proyecto->media_proyecto as $media)
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <!--Aqui for para imagenes -->
                        <div class="portfolio-inner rounded">
                            
                            <img style = "width: 500px; height: 400px; object-fit: contain;" class="img-fluid rounded mx-auto d-block" 
                            src={{asset($media->file_path)}} alt="">
                            <div class="portfolio-text">
                                <h4 class="text-white mb-4">Landscaping</h4>
                                <div class="d-flex">
                                    <a class="btn btn-lg-square rounded-circle mx-2"  href={{asset($media->file_path)}}
                                        data-lightbox="portfolio" data-bs-toggle="modal" data-bs-target="#viewImg">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a wire:click="id_img({{$media->id}})" class="btn btn-lg-square rounded-circle mx-2" data-bs-toggle="modal" 
                                    data-bs-target="#deleteImg">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
            <!-- comienza el ciclo for  para eventos-->
            
                <!--Comienza for de eventos -->
            <div class="container">
                <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                    <h2 class="display-5 mb-5"></h2>
                    <p></p>
                    
                    <button type="button" data-bs-toggle="modal" data-bs-target="#uploadImgModalEve" class="btn btn-secondary">
                    Cargar imagenes a galeria</button>
                </div>
                <div class="row g-4 portfolio-container">
                    <!--Inicio de for para imagenes -->
                    <div class="col-lg-4 col-md-6 portfolio-item first wow fadeInUp" data-wow-delay="0.1s">
                        <div class="portfolio-inner rounded ">
                            <img class="img-fluid" alt="">
                            <div class="portfolio-text">
                                <h4 class="text-white mb-4">Landscaping</h4>
                                <div class="d-flex">
                                    <a class="btn btn-lg-square rounded-circle mx-2" href="img/service-1.jpg "
                                    data-lightbox="portfolio" data-bs-toggle="modal" data-bs-target="#viewImg">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                    <a class="btn btn-lg-square rounded-circle mx-2" href=""
                                    data-lightbox="portfolio" data-bs-toggle="modal" data-bs-target="#deleteImg">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para cargar mas imagenes a los proyectos -->
    <div wire:ignore.self class="modal fade " id="uploadImgModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header " >
                    <h1 class="modal-title fs-5" id="uploadImgModal"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h2>Selecione las imagenes a cargar:</h2>
                    <input wire:model="files" type="file" accept="image/png,image/jpg,image/jpeg,image/svg" id="foto" class="form-control" multiple>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button wire:click="save_img()" type="submit" class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!--Modal eliminar media programas y eventos -->
    <div wire:ignore.self class="modal fade bd-example-modal-lg" id="deleteImg" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" >
                    <h1 class="modal-title fs-5" id="deleteImg">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <h2 class="text-center">Esta seguro que desea eliminar la siguiente imagen: </h2>
                <div class="modal-body">
                    <!--<img src= {{$direccion}} class="img-fluid rounded mx-auto d-block" style="max-width: 100%; height: auto; " alt=".." > -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button wire:click="delete_img()" type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    /*img {
        height: 400px;
        width: 500px;
        object-fit: contain;
    }*/
</style>