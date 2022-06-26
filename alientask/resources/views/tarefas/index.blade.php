<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarefas') }}
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

                    <h2>Suas Tarefas</h2>
                    <a href="{{route('tarefas-create')}}" class="btn" id="add"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a>
                    @if ($tarefas->count() > 0)
                    @foreach ($tarefas as $tarefa)
                        <div class="row shadow" id="task">
                            <div class="col" id="text">
                                @if ($tarefa->etiquetas)
                                <div class="row">
                                    @foreach ($tarefa->etiquetas as $etiqueta)
                                    @php
                                        $jsonDecode = json_decode($etiqueta, true);
                                        $lineThrough = "text-decoration: line-through";
                                    @endphp
                                    <div id="task-label" class="col-md" style="background-color: {{$jsonDecode['cor']}}; color: #FFF;">
                                        <b>{{$jsonDecode['titulo']}}</b>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
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
                                        <button type="submit" class="btn btn-secondary"><ion-icon name="lock-open-outline"></ion-icon></button>
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
                        <div class="row d-flex justify-content-center text-center">
                            <img src="/img/icons/outer-space-animate.svg" alt="Sem tarefas" class="img-fluid" style="width: 800px;filter: drop-shadow(4px 4px 4px #000);">
                            <h4>Não vamos nos acomodar.</h4>
                        </div>
                        <div class="row d-flex text-center">
                            <p>Você ainda não possui tarefas.  <a href="{{route('tarefas-create')}}" class="btn" id="add"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a></p>
                        </div>
                        @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/interfaces.js"></script>
</x-app-layout>