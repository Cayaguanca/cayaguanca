<div>
   
    <div class="container p-5">
        <h1>Suscritores Newsletter</h1>
        <div class="row align-items-start">
            <!-- Tabla suscritores  -->
            <table class="hover" id="suscriptores" style="width:100%">
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

<script>
    $(document).ready(function() {
        $('#suscriptores').DataTable({
            order: [
                [0, 'asc']
            ],
            "language": {
                "lengthMenu": "Mostrar _MENU_",
                "zeroRecords": "No se encuentran datos relacionados ",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles ",
                "infoFiltered": "(filtrado de _MAX_ registros totales)",
                'search':'Buscar',
                'paginate': {
                    'first':      'Primero',
                    'last':       'Ultimo',
                    'next':      'Siguiente',
                    'previous':  'Anterior',
                },
            },
        });
    });
</script>