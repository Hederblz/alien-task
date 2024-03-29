<x-app-layout>
    @section('subtitle', 'Tarefas')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Qual o seu próximo objetivo?') }}
        </h2>
    </x-slot>
    
    <x-icon></x-icon>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200" id="main">

                    <h2>Criar tarefa</h2>
                    
                    <form action="{{route('tarefas-armazenar')}}" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="titulo">Título</label>
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descricao</label>
                        <Textarea class="form-control" name="descricao" id="descricao"></Textarea>
                    </div>
                    <div class="form-group">
                        <label for="data_final_prevista">Data final prevista(opcional)</label>
                        <input type="date" name="data_final_prevista" id="data_final_prevista" class="form-control">
                    </div>

                    <div class="form-group">
                        <details>
                            <summary style="font-size: 1.5em">Etiquetas</summary>
                        @if ($etiquetas->count() > 0)
                        @foreach ($etiquetas as $etiqueta)
                        <div class="row form-group">
                        <div class="col d-flex shadow" id="label-check" style="background: {{$etiqueta->cor}}">
                            <input type="checkbox" name="etiquetas[]" id="etiqueta" value="{{$etiqueta}}">
                            <label for="etiquetas" style="color: #FFF;">{{$etiqueta['titulo']}}</label>
                        </div>
                    </div>
                        @endforeach
                        @else
                        <p>Você não possui etiquetas.</p>
                        @endif
                        </details>
                        
                    </div>
                    <button type="submit" class="btn" style="background: #9400D3; color: #FFF;">Criar tarefa</button>
                    </form>
                    <hr>
                    <div class="container-fluid">
                        <h2>Criar etiqueta</h2>
                        <form action="{{route('etiquetas-armazenarSimples')}}" method="post">
                            @csrf
                            <div class="d-flex">
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cor">Cor</label>
                                <input type="color" name="cor" id="cor">
                            </div>
                            </div>
                            <button type="submit" class="btn" id="add">Criar etiqueta</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/jquery.js"></script>
    <script type="text/javascript" src="/js/interfaces.js"></script>
</x-app-layout>