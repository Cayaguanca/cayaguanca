<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Galeria') }}
        </h2>
    </x-slot>
    @livewire('galerias.galerias')
</x-app-layout>