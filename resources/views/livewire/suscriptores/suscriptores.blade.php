<div>
    @foreach ($suscriptores as $suscritor)
        <tr>
            <td>{{ $suscritor->email }}</td>
            
        </tr>
    @endforeach
</div>
