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
                    <h2>Tarefas</h2>
                    @if ($tarefas->count() > 0)
                    <ul>
                        @foreach ($tarefas as $tarefa)
                        <li>{{$tarefa->titulo}}</li>
                        <li>{{$tarefa->descricao}}</li>
                        <li>{{$tarefa->data_final_prevista}}</li>
                        @endforeach
                        <li><a href="{{route('tarefas-edit', $tarefa->id)}}">Editar</a></li>
                        <li>
                            <form action="{{route('tarefas-destroy', $tarefa->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                        </li>
                    </ul>
                    @else
                    <h2>Você ainda não possui tarefas. <a href="{{route('tarefas-create')}}" class="btn btn-success">Criar tarefa</a></h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>