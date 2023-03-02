<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Listado de donantes') }}
        </h2>
    </x-slot>
    @livewire('donantes.donantes')
</x-app-layout>