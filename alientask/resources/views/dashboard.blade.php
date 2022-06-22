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
                   <div class="container-fluid">
                    <div class="row" id="msg">
                        @if (@session('msg'))
                            <p class="msg">{{session('msg')}}</p>
                        @endif
                    </div>
                   </div>
                    <h2>Tarefas</h2>
                    <a href="{{route('tarefas-create')}}" class="btn btn-success"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a>
                    @if ($tarefas->count() > 0)
                    @foreach ($tarefas as $tarefa)
                    <div class="container shadow" id="task">
                        <div class="row">
                            <div class="col" id="text">
                                <h3>{{$tarefa->titulo}}</h3>
                                <p>{{$tarefa->descricao}}</p>
                                <span>{{$tarefa->data_final_prevista}}</span>
                            </div>
                            <div class="col">
                                <form action="{{route('tarefas-check', $tarefa->id)}}" method="post">
                                    @csrf
                                    @method('PATCH')
                                    @if (!$tarefa->concluida)
                                    <button type="submit" class="btn btn-success"><ion-icon name="checkbox-outline"></ion-icon></button>
                                    @else
                                    <button type="submit" class="btn btn-danger"><ion-icon name="close-circle-outline"></ion-icon></button>
                                    @endif
                                   </form>
                            </div>
                            <div class="col">
                                <a href="{{route('tarefas-edit', $tarefa->id)}}" class="btn btn-warning"><ion-icon name="create-outline"></ion-icon></a>
                            </div>

                            <div class="col">
                                <form action="{{route('tarefas-destroy', $tarefa->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                </form>
                            </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <p>Você ainda não possui tarefas.  <a href="{{route('tarefas-create')}}" class="btn btn-success"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a></p>
                        @endif
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>