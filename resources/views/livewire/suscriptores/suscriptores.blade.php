<div>
    <div class="container p-5">
        <h1>Suscritores Newsletter</h1>
        <div class="row align-items-start">
            <!-- Tabla suscritores  -->
            <table class="table text-center" id="table" style="width:100%">
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
            {{ $suscriptores->links('pagination') }}
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