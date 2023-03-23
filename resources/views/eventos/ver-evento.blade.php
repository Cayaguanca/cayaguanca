<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ver Eventos') }}
        </h2>
    </x-slot>
    @livewire('eventos.ver-evento')
</x-app-layout>