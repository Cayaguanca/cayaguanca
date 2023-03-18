<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Proyectos Finalizados') }}
        </h2>
    </x-slot>
    @livewire('proyectos.proyectos-finalizados')
</x-app-layout>