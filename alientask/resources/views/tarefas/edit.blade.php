<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{route('tarefas-edit', Auth::user()->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <input type="text" name="titulo" placeholder="titulo">
                <input type="text" name="descricao" placeholder="descricao">
                <input type="data" name="data_final_prevista" placeholder="data_final_prevista">
                <button type="submit">Alterar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>