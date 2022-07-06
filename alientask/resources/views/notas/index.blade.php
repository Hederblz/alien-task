<x-app-layout>
    @section('subtitle', 'Notas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Notas') }}
        </h2>
    </x-slot>

    <x-icon></x-icon>
    
    <style>
        ion-icon
        {
            font-size: 1.2em;
        }
    </style>

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

                    <h2>Suas notas</h2>
                    <a href="{{route('notas-create')}}" class="btn" id="add">
                        <ion-icon name="add-outline"></ion-icon> Criar nota
                    </a>
                    <div class="row">
                        @if($notas->count() > 0)
                        @foreach ($notas as $nota)
                        <div class="card shadow" id="card" style="max-width: 25rem">
                            <div class="card-body">
                                @if ($nota->etiquetas)
                            <div class="row" id="labels-row">
                                @foreach ($nota->etiquetas as $etiqueta)
                                @php
                                    $jsonDecode = json_decode($etiqueta, true);
                                @endphp
                                <div class="d-flex" id="task-label" class="col" style="background-color: {{$jsonDecode['cor']}}; color: #FFF; margin:.2rem">
                                    <b>{{$jsonDecode['titulo']}}</b>
                                </div>
                                @endforeach
                            </div>
                            @endif
                                <h5 class="card-title">{{$nota->titulo}}</h5>
                                <x-markdown style="font-size: clamp(.8em, 1em, .5em)">
                                    {{$nota->conteudo}}
                                </x-markdown>
                                <div class="row">

                                    <div class="col">
                                        <a href="{{route('notas-show', $nota->id)}}" class="btn btn-secondary" id="add"><ion-icon name="reader-outline"></ion-icon></a>
                                    </div>

                                    <div class="col">
                                        <form action="{{route('notas-trancar', $nota->id)}}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            @if (!$nota->trancada)
                                            <button type="submit" class="btn btn-secondary"><ion-icon name="lock-open-outline"></ion-icon></button>
                                            @else
                                            <button type="submit" class="btn btn-secondary"><ion-icon name="lock-closed-outline"></ion-icon></button>
                                            @endif
                                        </form>
                                    </div>

                                    <div class="col">
                                        <a href="{{route('notas-edit', $nota->id)}}" class="btn btn-warning"><ion-icon name="create-outline"></ion-icon></a>
                                    </div>
        
                                    <div class="col">
                                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal"><ion-icon name="trash-outline"></ion-icon></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="row d-flex justify-content-center text-center">
                            <img src="/img/icons/alien-science-animate.svg" alt="Sem notas" class="img-fluid" style="width: 800px; filter: drop-shadow(4px 4px 4px #000);">
                            <h4>Melhor anotar para não esquecer.</h4>
                        </div>
                        <div class="row d-flex text-center">
                            <p>Você ainda não possui notas.  <a href="{{route('notas-create')}}" class="btn" id="add"><ion-icon name="add-outline"></ion-icon> Criar nota</a></p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="timer d-flex">
                <div class="row text-center">
                    <h2 id="counter">00:00:00</h2>
                </div>
            <div class="col d-flex">
                    <button class="btn btn-success" id="start" onclick="startCron()"><ion-icon name="play-outline"></ion-icon></button>
                    <button class="btn btn-warning" id="pause" onclick=pauseCron()><ion-icon name="pause-outline"></ion-icon></button>
                    <button class="btn btn-danger" id="zerar" onclick="stopCron()"><ion-icon name="refresh-outline"></ion-icon></button>
            </div>
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
        Tem certeza que você quer excluir essa nota?
      </div>
        @if ($notas->count() > 0)
            <form action="{{route('notas-destroy', $nota->id)}}" method="post" class="confirm">
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
    <script src="/js/timer.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</x-app-layout>