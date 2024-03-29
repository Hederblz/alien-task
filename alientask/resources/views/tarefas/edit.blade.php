<x-app-layout>
    @section('subtitle', 'Tarefas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editor de Tarefa') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                <form action="{{route('tarefas-atualizar', $tarefa->id)}}" method="POST">
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
                <div class="form-group">
                    <details>
                            <summary style="font-size: 1.5em">Etiquetas</summary>
                    @if ($etiquetas->count() > 0)
                    @foreach ($etiquetas as $etiqueta)
                    @php
                     $jsonDecode = json_decode($etiqueta)   
                    @endphp
                    <div class="row form-group">
                        <div class="col d-flex shadow" id="label-check" style="background: {{$etiqueta->cor}}">
                            <input type="checkbox" name="etiquetas[]" id="etiqueta" value="{{$etiqueta}}">
                            <label for="etiquetas" style="color: #FFF;">{{$etiqueta['titulo']}}</label>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <p>Você não possui etiquetas.</p>
                    @endif
                    </details>
                </div>
                <button type="submit" class="btn btn-success">Alterar</button>
                </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>