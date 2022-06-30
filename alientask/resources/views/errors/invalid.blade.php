<x-app-layout>
    @section('subtitle', 'Notas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criação de nota') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Ops... {{$titulo}} não encontrada</h2>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>