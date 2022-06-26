<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Qual o seu próximo objetivo?') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2>Criar tarefa</h2>
                    <form action="{{route('tarefas-store')}}" method="post">
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
                        <h2>Etiquetas</h2>
                        @if ($etiquetas->count() > 0)
                        @foreach ($etiquetas as $etiqueta)
                        <div class="row form-group">
                            <label for="etiqueta">{{$etiqueta->titulo}}</label>
                            <input type="checkbox" name="etiquetas[]" id="etiqueta" class="form-control" value="{{$etiqueta}}">
                        </div>
                        @endforeach
                        @else
                        <p>Você não possui etiquetas. <button class="btn etiqueta" id="togglecreate" style="background: #9400D3; color:#FFF;">Criar marcador</button></p>
                        @endif
                    </div>
                    <button type="submit" class="btn" id="add">Criar tarefa</button>
                    </form>
                    <div class="container-fluid">
                        <h2>Criar etiqueta</h2>
                        <form action="{{route('etiquetas-store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="titulo">Título</label>
                                <input type="text" name="titulo" id="titulo" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="cor">Cor</label>
                                <input type="color" name="cor" id="cor" class="form-control">
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