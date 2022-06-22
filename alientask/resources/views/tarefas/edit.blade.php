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
                <form action="{{route('tarefas-update', $tarefa->id)}}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="titulo">Título</label>
                    <input type="text" name="titulo" name="titulo" class="form-control" value="{{$tarefa->titulo}}" required>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <input type="text" name="descricao" id="descricao" value="{{$tarefa->descricao}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="data_final_prevista">Data final prevista(opcional)</label>
                    <input type="date" name="data_final_prevista" id="data_final_prevista" class="form-control" value="{{$tarefa->data_final_prevista}}">
                </div>
                <button type="submit" class="btn btn-success">Alterar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>