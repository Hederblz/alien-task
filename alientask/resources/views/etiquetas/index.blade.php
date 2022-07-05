<x-app-layout>
    @section('subtitle', 'Etiquetas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Etiquetas') }}
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

                    <h2>Suas etiquetas</h2>
                    <a href="{{route('etiquetas-create')}}" class="btn" id="add">
                        <ion-icon name="add-outline"></ion-icon> Criar etiqueta
                    </a>
                    <div class="container-fluid" id="labels-row">
                      @if ($etiquetas->count() > 0)
                          @foreach ($etiquetas as $etiqueta)
                              <div class="shadow text-center" id="label" style="background-color: {{$etiqueta->cor}}; color:#FFF;">
                                <b>{{$etiqueta->titulo}}</b>
                                
                                    <a href="{{route('etiquetas-edit', $etiqueta->id)}}" class="btn btn-warning"><ion-icon name="create-outline"></ion-icon></a>            

                                    <form action="{{route('etiquetas-destroy', $etiqueta->id)}}" method="post" class="confirm">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><ion-icon name="trash-outline"></ion-icon></button>
                                    </form>
                              </div>
                          @endforeach
                          @else
                          <div class="row d-flex justify-content-center text-center">
                            <img src="/img/icons/alien-labels-animate.svg" alt="Não há etiquetas" class="img-fluid" style="width: 800px">
                            <h4>Hora de classificar os afazeres</h4>
                          </div>
                          <div class="row d-flex text-center">
                              <p>Você não possui etiquetas. <a href="#" class="btn" id="add"><ion-icon name="add-outline"></ion-icon>  Criar etiqueta</a></p>
                          </div>
                      @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/interfaces.js"></script>
    <style>
        ion-icon
        {
            font-size: 1.2em;
        }
        #destroy
        {
            padding-left: 2rem;
            padding-right: 2rem;
            text-align: center;
        }
    </style>
</x-app-layout>