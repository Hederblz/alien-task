<x-app-layout>
    @section('subtitle', 'Tarefas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tarefas') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 border-b border-gray-200" id="main">
                    
                    @if (@session('msg'))
                    <div class="container rounded-pill" id="msg">
                        <span class="msg">{{session('msg')}}</span>
                        <ion-icon name="close-circle-outline" class="shadow" id="close"></ion-icon>
                    </div>
                    @endif

                    <h2>Suas Tarefas</h2>
                    <a href="{{route('tarefas-create')}}" class="btn" id="add">
                        <ion-icon name="add-outline"></ion-icon> Criar tarefa
                    </a>
                    
                    @if ($tarefas->count() > 0)
                    @foreach ($tarefas as $tarefa)
                        <div class="row shadow mt-5" id="task">
                            @php
                                $dataFinalPrevista = \Carbon\Carbon::parse($tarefa->data_final_prevista);
                                $dataConclusao = \Carbon\Carbon::parse($tarefa->data_conclusao);
                                $hoje = \Carbon\Carbon::parse(date('d-m-Y'));
                                $amanha = \Carbon\Carbon::parse(date('d-m-Y', strtotime('+1 day')));
                                $intervalo = $dataConclusao->diff($dataFinalPrevista);
                            @endphp
                            @if (strtotime($dataFinalPrevista) == strtotime($hoje) && !$tarefa->concluida)
                            <div class="container alert" id="msg">
                                <span class="msg">A data final para essa tarefa é Hoje!</span>
                                <ion-icon name="close-circle-outline" class="shadow" id="closealert"></ion-icon>
                            </div>
                            @elseif(strtotime($dataFinalPrevista) == strtotime($amanha) && !$tarefa->concluida)
                            <div class="container alert" id="msg">
                                <span class="msg">A data final para essa tarefa é Amanhã!</span>
                                <ion-icon name="close-circle-outline" class="shadow" id="closealert"></ion-icon>
                            </div>
                            @elseif(strtotime($dataConclusao) > strtotime($dataFinalPrevista) && !$tarefa->concluida)
                            <div class="container alert" id="msg">
                                <span class="msg">Esta tarefa está atrasada em {{$intervalo->m}} meses, e {{$intervalo->d}} dias!</span>
                                <ion-icon name="close-circle-outline" class="shadow" id="closealert"></ion-icon>
                            </div>
                            @endif
                            <div class="col" id="text">
                                @if ($tarefa->etiquetas)
                                <div class="row" id="task-label-field">
                                    
                                    @foreach ($tarefa->etiquetas as $etiqueta)
                                    @php
                                        $jsonDecode = json_decode($etiqueta, true);
                                        $lineThrough = "text-decoration: line-through";
                                    @endphp
                                    <div id="task-label" class="col-md" style="background-color: {{$jsonDecode['cor']}}; color: #FFF; margin: .5rem;">
                                        <b>{{$jsonDecode['titulo']}}</b>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                                <h3>{{$tarefa->titulo}}</h3>
                                <p>{{$tarefa->descricao}}</p>
                                <div class="row">
                                <span>Data final prevista: {{\Carbon\Carbon::parse($tarefa->data_final_prevista)->format('d-m-Y')}}</span>
                                @if($tarefa->concluida)
                                <span>Data de conclusão: {{\Carbon\Carbon::parse($tarefa->data_conclusao)->format('d-m-Y')}}</span>
                                @endif
                                </div>
                            </div>

                            <div class="row d-flex align-middle">
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