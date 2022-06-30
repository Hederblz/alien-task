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
                                <p class="card-text">{{$nota->conteudo}}</p>
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
                                        <form action="{{route('notas-destroy', $nota->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                        </form>
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
                    <h2>Criar etiqueta</h2>
                    <form action="{{route('etiquetas-simple-store')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group" id="">
                        <input type="color" name="cor" id="cor" class="form-control">
                        <label for="cor">Cor</label>
                    </div>
                    <button type="submit" class="btn" id="add">Criar etiqueta</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/interfaces.js"></script>
</x-app-layout>