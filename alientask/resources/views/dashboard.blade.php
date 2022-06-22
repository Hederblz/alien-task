<x-app-layout>
    @section('subtitle', 'Painel inicial')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel inicial') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    @if (@session('msg'))

                    <div class="container" id="msg">
                            <span class="msg">{{session('msg')}}</span>
                            <ion-icon name="close-circle-outline" class="shadow" id="close"></ion-icon>
                    </div>

                        @endif

                        <div class="container-fluid">
                            <h2>Tarefas</h2>
                            <a href="{{route('tarefas-create')}}" class="btn" id="add"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a>
                            @if ($tarefas->count() > 0)
                            @foreach ($tarefas as $tarefa)
                                <div class="row shadow" id="task">
                                    <div class="col" id="text">
                                        <h3>{{$tarefa->titulo}}</h3>
                                        <p>{{$tarefa->descricao}}</p>
                                        <span>{{$tarefa->data_final_prevista}}</span>
                                    </div>

                                    <div class="row">

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
                                            <form action="{{route('tarefas-trancar', $tarefa->id)}}" method="post">
                                                @csrf
                                                @method('PATCH')
                                                @if (!$tarefa->trancada)
                                                <button type="submit" class="btn btn-secondary" id="add"><ion-icon name="lock-open-outline"></ion-icon></button>
                                                @else
                                                <button type="submit" class="btn btn-secondary"><ion-icon name="lock-closed-outline"></ion-icon></button>
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
                                <p>Você ainda não possui tarefas.  <a href="{{route('tarefas-create')}}" class="btn"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a></p>
                                @endif
                            </div>
                            
                            <div class="container-fluid">
                                <h2>Notas</h2>
                                <a href="{{route('notas-create')}}" class="btn" id="add"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a>
                                <div class="row">
                                    @if($notas->count() > 0)
                                    @foreach ($notas as $nota)
                                    <div class="col shadow" id="note">
                                        <div class="row">
                                            <h3>{{$nota->titulo}}</h3>
                                        </div>
                                        <div class="row">
                                            <p>{{$nota->conteudo}}</p>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <a href="{{route('notas-edit', $nota->id)}}" class="btn btn-warning"><ion-icon name="create-outline"></ion-icon></a>
                                    </div>
        
                                    <div class="col">
                                        <form action="{{route('notas-destroy', $nota->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                        </form>
                                    </div>
                                    @endforeach
                                    @else
                                    <p>Você ainda não possui notas.  <a href="{{route('notas-create')}}" class="btn"><ion-icon name="add-outline"></ion-icon> Criar nota</a></p>
                                @endif
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>