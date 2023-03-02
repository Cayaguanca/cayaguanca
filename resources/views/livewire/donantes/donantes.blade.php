<div>
    <div class="fluid-container">
        <div class="row">
            <div class="col"></div>

            <div class="col-8">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($donantes as $donante)
                            <tr>
                                <td>{{ $donante->nombre }}</td>
                                <td>
                                    <button wire:click="editarDonante({{ $donante->id }})">Editar</button>
                                    <button>Eliminar</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <button>
                        <svg width="32" height="37" viewBox="0 0 32 37" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M22.6667 3.24579H9.33333C5.65143 3.24579 2.66666 6.65287 2.66666 10.8557V26.0756C2.66666 30.2784 5.65143 33.6855 9.33333 33.6855H22.6667C26.3486 33.6855 29.3333 30.2784 29.3333 26.0756V10.8557C29.3333 6.65287 26.3486 3.24579 22.6667 3.24579Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M21.3333 17.5068C21.4979 18.7734 21.3083 20.0671 20.7917 21.2037C20.275 22.3403 19.4575 23.262 18.4555 23.8377C17.4535 24.4134 16.3179 24.6138 15.2104 24.4104C14.1028 24.207 13.0797 23.6101 12.2865 22.7046C11.4932 21.7991 10.9703 20.6312 10.7921 19.367C10.6139 18.1027 10.7894 16.8065 11.2938 15.6627C11.7981 14.5189 12.6056 13.5857 13.6013 12.996C14.597 12.4062 15.7303 12.1899 16.84 12.3777C17.9719 12.5693 19.0198 13.1713 19.8289 14.0949C20.6381 15.0186 21.1655 16.2147 21.3333 17.5068Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.3333 10.0947H23.3467" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>                            
                    </button>
                </table>
            </div>

            <div class="col"></div>
        </div>        
    </div>
</div>