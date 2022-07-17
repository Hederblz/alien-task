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
                    <div class="container-fluid row" id="labels-row">
                      @if ($etiquetas->count() > 0)
                          @foreach ($etiquetas as $etiqueta)
                              <div class="shadow text-center col" id="label" style="background-color: {{$etiqueta->cor}}; color:#FFF;">
                                <b>{{$etiqueta->titulo}}</b>
                                
                                    <a href="{{route('etiquetas-edit', $etiqueta->id)}}" class="btn btn-warning" style="margin: .2rem;"><ion-icon name="create-outline"></ion-icon></a>
                                    
                                    <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#exampleModal" style="margin: .2rem;"><ion-icon name="trash-outline"></ion-icon></button>

                              </div>
                          @endforeach
                          @else
                          <div class="row d-flex justify-content-center text-center">
                            <img src="/img/icons/alien-labels-animate.svg" alt="Não há etiquetas" class="img-fluid" style="width: 700px">
                            <h4>Hora de classificar os afazeres</h4>
                          </div>
                          <div class="row d-flex text-center">
                              <p>Você não possui etiquetas. <a href="{{route('etiquetas-create')}}" class="btn" id="add"><ion-icon name="add-outline"></ion-icon>  Criar etiqueta</a></p>
                          </div>
                      @endif
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
        Tem certeza que você quer excluir essa etiqueta?
      </div>
      @if ($etiquetas->count() > 0)
            <form action="{{route('etiquetas-destroy', $etiqueta->id)}}" method="post" class="confirm">
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