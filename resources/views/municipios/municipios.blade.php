<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Municipios') }}
        </h2>
    </x-slot>
    @livewire('municipios.municipios')
</x-app-layout>