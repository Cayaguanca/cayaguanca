<div>
   
    <div class="container p-5">
        <h1>Suscritores Newsletter</h1>
        <div class="d-flex bd-highlight">
            <div class="me-auto p-2 bd-highlight">
                <input wire:model="search" class="form-control float-left mx-auto " placeholder="Buscar Suscriptor" aria-label="Sizing example input" type="text" >
            </div>
        </div>
        <div class="row align-items-start">
            <!-- Tabla suscritores  -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Correo Electronico del suscriptor</th>
                        <th>fecha de suscripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suscriptores as $suscritor)
                        <tr>
                            <td>{{ $suscritor->id }}</td>
                            <td>{{ $suscritor->email }}</td>
                            <td>{{ $suscritor->fecha }}</td>
                        </tr>
                    @endforeach
                </tbody>
          </table>
        </div>
    </div>
</div>

<style>
    .table{
        background-color: #FFFFFF;
        border-radius: 10% 10% 0% 0%;
        border-collapse: collapse;
    }
</style>