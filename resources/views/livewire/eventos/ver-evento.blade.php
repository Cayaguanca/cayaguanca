<div>
    <div class="container-fluid mb-5">
        
        <div class="row">
            <h1 class="centrar">Evento</h1>
            <div class="col">
                <div class="bordeCuadroIzquierdo">
                    <div class="contenedor_img">
                        <div class="img_principal img-fluid">
                            <img class="actual_img" alt="foto" src={{asset($media[0]->file_path)}}>
                        </div>
                        <div class="contenedor_opciones_img">
                            @foreach ($media as $m)
                            <img class="opcion_img" alt="foto" width="400" height="400" src={{asset($m->file_path)}}>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col bordeCuadroDerecho">
                <p><h3>{{ $evento->nombre_evento }}</h3></p>
                <p>{{ $evento->descripcion_evento }}</p>
                <div class="row ">
                    <div class="col ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Direccion</th>
                                    <th>Municipio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detallesAdd as $detalle)
                                    <tr>
                                        <td>{{ $detalle['fecha'] }}</td>
                                        <td>{{ $detalle['direccion_evento'] }}</td>
                                        <td>{{ $detalle['municipio'] }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <div>
    </div>
    <script>
        const main_img = document.querySelector('.actual_img')
        const thumbnails = document.querySelectorAll('.opcion_img')
        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function(){
                const active = document.querySelector('.active')
                active.classList.remove('active')
                thumb.classList.add('active')
                main_img.src = thumb.src
            })
        })
    </script>


</div>

<style>

.bordeCuadroIzquierdo{
    align-items: center;
    margin-left: 10%;
    border-radius: 10% 0% 0% 10%;
    background-color: white;
    margin-bottom:100px;
}
.bordeCuadroDerecho{
    margin-right: 10%;
    border-radius: 0% 10% 10% 0%;
    background-color: white;
    margin-bottom:100px;
}
.centrar{
    text-align: center;
}

.abs-center{
    display: flex;
    align-items: center;
    justify-content: center; 
}
.contenedor_img{
    padding-top: 10px;
}
.img_principal {
    padding-top: 50px;
    padding-left: 50px;
    padding-right: 50px;
    margin-bottom: 20px;   
    display: flex;
    align-items: center;
    justify-content: center;  
}
.actual_img {
    width: 100%;
    height: 100%;
    border-radius: 5px;
    box-shadow: 0 5px 5px rgba(1, 23, 46, 0.6);
    object-fit: cover;
}
.contenedor_opciones_img {
    align-items: center;
    justify-content: center; 
    width: 400px;
    display:flex;
    margin-left: 50px;
    margin-right: 50px;
    justify-content: space-between;
    overflow-y: auto; 

}
.opcion_img {
    width: 80px;
    height: 80px;
    border-radius: 5px;
    cursor: pointer;
    object-fit: cover;
    opacity: .7;
    transition: .3s;
}
.opcion_img:hover {
    opacity: 1;
}

</style>