<div>
    <div class="container-fluid mb-5">
        
        <div class="row">
            <h1 class="centrar">Evento</h1>
            <div class="col bordeCuadroIzquierdo border border-3 border-top-0 border-bottom-0 border-start-0 border-secondary">
                
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
</div>

<style>
.bordeCuadroIzquierdo{

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
</style>