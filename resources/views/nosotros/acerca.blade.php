<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Acerca de Nosotros') }}
        </h2>
    </x-slot>
    @livewire('nosotros.acerca')
</x-app-layout>