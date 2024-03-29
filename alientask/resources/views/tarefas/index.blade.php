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
                    <a href="{{route('tarefas-criar')}}" class="btn" id="add">
                        <ion-icon name="add-outline"></ion-icon> Criar tarefa
                    </a>
                    
                    @if ($tarefas->count() > 0)
                    @foreach ($tarefas as $tarefa)
                        <div class="row shadow mt-5" id="task">
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
                                    @if ($tarefa->data_final_prevista)
                                    <span>Data final prevista: {{\Carbon\Carbon::parse($tarefa->data_final_prevista)->format('d-m-Y')}}</span>
                                    @endif
                                @if($tarefa->concluida)
                                <span>Data de conclusão: {{\Carbon\Carbon::parse($tarefa->data_conclusao)->format('d-m-Y')}}</span>
                                @endif
                                </div>
                            </div>

                            <div class="row d-flex align-middle">
                                <div class="col">
                                   @if (!$tarefa->concluida)

                                    <form action="{{route('tarefas-concluir', $tarefa->id)}}" method="post">
                                     @csrf
                                     @method('PATCH')
                                     <button type="submit" class="btn btn-success"><ion-icon name="checkmark-outline"></ion-icon></button>
                                    </form>

                                    @else

                                    <form action="{{route('tarefas-desfazerConclusao', $tarefa->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-danger"><ion-icon name="close-outline"></ion-icon></button>
                                       </form>
                                    
                                   @endif
                                </div>

                                <div class="col">
                                    @if (!$tarefa->trancada)

                                    <form action="{{route('tarefas-trancar', $tarefa->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-secondary"><ion-icon name="lock-open-outline"></ion-icon></button>
                                    </form>

                                    @else

                                    <form action="{{route('tarefas-destrancar', $tarefa->id)}}" method="post">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-secondary"><ion-icon name="lock-closed-outline"></ion-icon></button>
                                    </form>

                                    @endif
                                </div>

                                <div class="col">
                                    <a href="{{route('tarefas-editar', $tarefa->id)}}" class="btn btn-warning"><ion-icon name="create-outline"></ion-icon></a>
                                </div>
    
                                <div class="col">
                                <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal"><ion-icon name="trash-outline"></ion-icon></button>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row d-flex justify-content-center text-center">
                            <img src="/img/icons/outer-space-animate.svg" alt="Sem tarefas" class="img-fluid" style="width: 700px;filter: drop-shadow(4px 4px 4px #000);">
                            <h4>Não vamos nos acomodar.</h4>
                        </div>
                        <div class="row d-flex text-center">
                            <p>Você ainda não possui tarefas.  <a href="{{route('tarefas-criar')}}" class="btn" id="add"><ion-icon name="add-outline"></ion-icon> Criar tarefa</a></p>
                        </div>
                        @endif
                </div>
            </div>
        </div>
                        <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Zona perigosa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que você quer excluir essa tarefa?
      </div>
        @if ($tarefas->count() > 0)
                <form action="{{route('tarefas-excluir', $tarefa->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-outline-danger">Excluir</button>
                    </div>
                </form>
        @endif
            </div>
        </div>
    </div>
  </div>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/interfaces.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</x-app-layout>